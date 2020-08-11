<?php

namespace App\Http\Controllers;

use App\ingredientes;
use App\menuPizzas;
use Illuminate\Http\Request;

class MenuPizzasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $menuPizzasList = menuPizzas::all();
            return $menuPizzasList;

        } catch (\Exception $e) {

            $arr = array('Mensaje' => 'Error interno en el servidor o no se puede acceder a la base de datos');

            return response(json_encode($arr), 500);

        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function menuPizzaView()
    {
        try {
            $pila = array();
            //  array_push($pila, "manzana", "arándano");

            $menuPizzasList = menuPizzas::all();

            foreach ($menuPizzasList as $key => $value) {
                $arrayIngrediente = json_decode($value->ingredientes);
                $arrayUngredienteView = array();

                foreach ($arrayIngrediente as $key => $valueIngrediente) {
                    $ingrediente = ingredientes::find($valueIngrediente);
                    array_push($arrayUngredienteView, $ingrediente->ingrediente);

                }
                $value->ingredientes = $arrayUngredienteView;
                array_push($pila, $value);
            }

            return $pila;

        } catch (\Exception $e) {

            $arr = array('Mensaje' => 'Error interno en el servidor o no se puede acceder a la base de datos');

            return response(json_encode($arr), 500);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function menuPizzaViewshow($id)
    {
        try {
            $pila = array();

            $MenuPizzas = menuPizzas::find($id);

            if ($MenuPizzas) {

                $objView = $MenuPizzas;
                $arrayIngrediente = json_decode($MenuPizzas->ingredientes);

                $arrayUngredienteView = array();

                foreach ($arrayIngrediente as $key => $valueIngrediente) {
                    $ingrediente = ingredientes::find($valueIngrediente);
                    array_push($arrayUngredienteView, $ingrediente->ingrediente);

                }
                $objView->ingredientes = $arrayUngredienteView;
                array_push($pila, $objView);

                return $pila;

            }
            $arr = array('Mensaje' => 'Ingrediente No Existe');

            return response(json_encode($arr), 404);

        } catch (\Exception $e) {

            $arr = array('Mensaje' => 'Error interno en el servidor o no se puede acceder a la base de datos');

            return response(json_encode($arr), 500);

        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $datos = $request->all();

            $MenuPizzas = menuPizzas::create($datos);
            return $MenuPizzas;

        } catch (\Exception $e) {

            $arr = array('Mensaje' => 'Error interno en el servidor o no se puede acceder a la base de datos');

            return response(json_encode($arr), 500);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $MenuPizzas = menuPizzas::find($id);

            if ($MenuPizzas) {
                return $MenuPizzas;
            }
            $arr = array('Mensaje' => 'La Pizza no Esta diponible en el menu');

            return response(json_encode($arr), 404);

        } catch (\Exception $e) {

            $arr = array('Mensaje' => 'Error interno en el servidor o no se puede acceder a la base de datos');

            return response(json_encode($arr), 500);

        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        try {
            $MenuPizzas = menuPizzas::find($id);

            if ($MenuPizzas) {

                $MenuPizzas->nombre = $request->nombre;
                $MenuPizzas->ingredientes = json_encode($request->ingredientes);
                $MenuPizzas->precio = $request->precio;
                $MenuPizzas->estado = $request->estado;

                $MenuPizzas->save();

                return $MenuPizzas;
            }
            $arr = array('Mensaje' => 'La Pizza no Esta diponible en el menu');

            return response(json_encode($arr), 404);

        } catch (\Exception $e) {

            $arr = array('Mensaje' => 'Error interno en el servidor o no se puede acceder a la base de datos');

            return response(json_encode($arr), 500);

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
            $MenuPizzas = menuPizzas::find($id);

            $MenuPizzas->estado = "Inactivo";
            $MenuPizzas->save();

            $arr = array('Mensaje' => 'Registro desactivado');
            json_encode($arr);

            return json_encode($arr);

        } catch (\Exception $e) {

            $arr = array('Mensaje' => 'Error interno en el servidor o no se puede acceder a la base de datos');

            return response(json_encode($arr), 500);

        }

    }
}
