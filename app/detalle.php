<?php

namespace App;


use App\ingredientes;
use App\menuPizzas;

class detalle
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  array  $lista
     * @param  string  $estado
     * @return Object
     */

    public function vistadetalle($lista, $estado )
    {
        $totalprecio = 0;
        $cantidadP = 0;
        $arrayvista = array();

        foreach ($lista as $key => $value) {

            if ($key == "M") {
                $cantidadP += count($value);
                foreach ($value as $key => $valueM) {
                    $MenuPizzas = menuPizzas::find($valueM);
                    $totalprecio += $MenuPizzas->precio;
                    $arrayUngredienteView = array();
                    $arraylitIngre = json_decode($MenuPizzas->ingredientes);

                    foreach ($arraylitIngre as $key => $valueIngrediente) {
                        $ingrediente = ingredientes::find($valueIngrediente);
                        array_push($arrayUngredienteView, $ingrediente->ingrediente);

                    }

                    array_push($arrayvista, ["menu" => $valueM, "nombre" => $MenuPizzas->nombre, "ingredientes" => $arrayUngredienteView, "precio" => $MenuPizzas->precio]);
                    $arrayUngredienteView = [];

                }

            } else {
                $cantidadP += count($value);

                $precioIngre = 0;

                $arrayUngredienteView = array();

                foreach ($value as $key => $valueP) {

                    foreach ($valueP as $key => $idIngrediente) {
                        $Ingredientes = ingredientes::find($idIngrediente);

                        if($estado=="Entregado"){
                            $Ingredientes->popularida+=1;
                            $Ingredientes->save();
                        }

                        $precioIngre += $Ingredientes->precio;
                        $totalprecio += $Ingredientes->precio;
                        array_push($arrayUngredienteView, ["ingrediente" => $Ingredientes->ingrediente, "precio" => $Ingredientes->precio]);

                    }

                    array_push($arrayvista, ["menu" => "no", "nombre" => "presonalizada", "ingredientes" => $arrayUngredienteView, "precio" => $precioIngre, "Extras" => 8, "total" => ($precioIngre += 8)]);
                    $arrayUngredienteView = [];
                    $precioIngre = 0;

                }
                $totalprecio += 8 * count($value); // * precio de pan pizza,salsa,queso para la pizza personalizada

            }

        }

        $object = new \stdClass();
        $contador = 0;

        foreach ($arrayvista as $key => $value) {
            $contador++;
            $key = "pizza" . $contador;
            $object->$key = $value;
        }

        $detalle = (Object) ["total" => $totalprecio, "cantidad" => $cantidadP, "detalle" => $object];

        return $detalle;

    }

}
