<?php

namespace App\Http\Controllers;

use App\sucursale;
use Illuminate\Http\Request;

class SucursaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $sucursaleList = sucursale::where('estado', 'Activo')->get();
            return $sucursaleList;

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
            $Sucursale = sucursale::create($datos);
            return $Sucursale;

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
            $Sucursale = sucursale::find($id);

            if ($Sucursale) {
                return $Sucursale;
            }
            $arr = array('Mensaje' => 'Sucursal No Existe');

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
            $Sucursale = sucursale::find($id);

            if ($Sucursale) {
                $Sucursale->departamentos_id = $request->departamentos_id;
                $Sucursale->direcion = $request->direcion;
                $Sucursale->telefono = $request->telefono;
                $Sucursale->estado = $request->estado;

                $Sucursale->save();

                return $Sucursale;
            }
            $arr = array('Mensaje' => 'Sucursal No Existe');

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
            $Sucursale = sucursale::find($id);

            $Sucursale->estado = "Inactivo";
            $Sucursale->save();

            $arr = array('Mensaje' => 'Registro desactivado');
            json_encode($arr);

            return json_encode($arr);

        } catch (\Exception $e) {

            $arr = array('Mensaje' => 'Error interno en el servidor o no se puede acceder a la base de datos');

            return response(json_encode($arr), 500);

        }

    }
}
