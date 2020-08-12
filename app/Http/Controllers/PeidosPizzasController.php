<?php

namespace App\Http\Controllers;

use App\detalle;
use App\peidosPizzas;
use App\sucursale;
use App\user;
use Illuminate\Http\Request;

class PeidosPizzasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $peidosPizzasList = peidosPizzas::all();
            foreach ($peidosPizzasList as $key => $value) {
                $value->pizza = json_decode($value->pizza);
            }
            return $peidosPizzasList;

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

            $objetoP = json_encode($datos);
            $arraypizas = json_decode($objetoP)->pizza;


            $Detalle = new detalle();
      

            $objDetalle = $Detalle->vistadetalle($arraypizas, $datos["estado"]);

            $datos["total"] = $objDetalle->total;

            $datos["pizza"] = json_encode($request->all()["pizza"]);
            $datos["cantidad"] = $objDetalle->cantidad;


            $PeidosPizzas = peidosPizzas::create($datos);
            $direcionS = sucursale::find($PeidosPizzas->sucursales_id);
            $usuario = user::find($PeidosPizzas->users_id);

            $vista = (Object)
                ["N°" => $PeidosPizzas->id,
                "Sucursal" => $direcionS->direcion,
                "para" => $usuario->nombre,
                "direccion" => $usuario->direcion,
                "detalle" => $objDetalle->detalle,
                "total" => $PeidosPizzas->total,
                "estado" => $PeidosPizzas->estado];

            return json_encode($vista);

        } catch (\Exception $e) {

            if ($e->getCode() == 0) {
                $arr = array('Mensaje' => 'Selecione Pizzas que se encuentren en el Menu o ingrdiente Que se Encuentren en la lista de ingredientes');

                return response(json_encode($arr), 403);

            }
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
            $PeidosPizzas = peidosPizzas::find($id);

            if ($PeidosPizzas) {

                $arraypizas = json_decode($PeidosPizzas->pizza);

                $Detalle = new detalle();

                $objDetalle = $Detalle->vistadetalle($arraypizas, $PeidosPizzas->estado);

                $direcionS = sucursale::find($PeidosPizzas->sucursales_id);
                $usuario = user::find($PeidosPizzas->users_id);
                $vista = (Object)
                    ["N°" => $PeidosPizzas->id,
                    "Sucursal" => $direcionS->direcion,
                    "para" => $usuario->nombre,
                    "direccion" => $usuario->direcion,
                    "detalle" => $objDetalle->detalle,
                    "total" => $PeidosPizzas->total,
                    "estado" => $PeidosPizzas->estado];

                return json_encode($vista);

            }
            $arr = array('Mensaje' => 'Pedido No Existe');

            return response(json_encode($arr), 404);

        } catch (\Exception $e) {
            if ($e->getCode() == 0) {
                $arr = array('Mensaje' => 'Selecione Pizzas que se encuentren en el Menu o ingrdiente Que se Encuentren en la lista de ingredientes');

                return response(json_encode($arr), 403);

            }
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
            $PeidosPizzas = peidosPizzas::find($id);

            if ($PeidosPizzas) {

                $PeidosPizzas->sucursales_id = $request->sucursales_id;
                $PeidosPizzas->users_id = $request->users_id;
                $PeidosPizzas->pizza = json_encode($request->pizza);

                $arraypizas = json_decode($PeidosPizzas->pizza);

                $Detalle = new detalle();

                $objDetalle = $Detalle->vistadetalle($arraypizas, $request->estado);

                $request->total = $objDetalle->total;
                $request->cantidad = $objDetalle->cantidad;

                $PeidosPizzas->cantidad = $request->cantidad;
                $PeidosPizzas->total = $request->total;
                $PeidosPizzas->estado = $request->estado;

                $PeidosPizzas->save();

                $direcionS = sucursale::find($PeidosPizzas->sucursales_id);
                $usuario = user::find($PeidosPizzas->users_id);
                $vista = (Object)
                    ["N°" => $PeidosPizzas->id,
                    "Sucursal" => $direcionS->direcion,
                    "para" => $usuario->nombre,
                    "direccion" => $usuario->direcion,
                    "detalle" => $objDetalle->detalle,
                    "total" => $PeidosPizzas->total,
                    "estado" => $PeidosPizzas->estado];

                return json_encode($vista);

            }
            $arr = array('Mensaje' => 'Pedido No Existe');

            return response(json_encode($arr), 404);

        } catch (\Exception $e) {
            dd($e);
            if ($e->getCode() === "23000") {
                $arr = array('Mensaje' => 'Verifique los identificadores sean validos');

                return response(json_encode($arr), 403);

            } else {
                $arr = array('Mensaje' => 'Error interno en el servidor o no se puede acceder a la base de datos');

                return response(json_encode($arr), 500);

            }

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
            $PeidosPizzas = peidosPizzas::find($id);

            $PeidosPizzas->estado = "Inactivo";
            $PeidosPizzas->save();

            $arr = array('Mensaje' => 'Registro desactivado');
            json_encode($arr);

            return json_encode($arr);

        } catch (\Exception $e) {

            $arr = array('Mensaje' => 'Error interno en el servidor o no se puede acceder a la base de datos');

            return response(json_encode($arr), 500);

        }

    }

}
