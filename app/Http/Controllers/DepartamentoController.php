<?php

namespace App\Http\Controllers;

use App\departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $departamentoList = departamento::where('estado', 'Activo')->get();
            return $departamentoList;

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
            $Departamento = departamento::create($datos);
            return $Departamento;

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
            $Departamento = departamento::find($id);

            if ($Departamento) {
                return $Departamento;
            }
            $arr = array('Mensaje' => 'Departamento No Existe');

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
            $Departamento = departamento::find($id);

            if ($Departamento) {

                $Departamento->nombre = $request->nombre;
                $Departamento->estado = $request->estado;

                $Departamento->save();

                return $Departamento;
            }
            $arr = array('Mensaje' => 'Departamento No Existe');

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
            $Departamento = departamento::find($id);

            $Departamento->estado = "Inactivo";
            $Departamento->save();

            $arr = array('Mensaje' => 'Registro desactivado');
            json_encode($arr);

            return json_encode($arr);

        } catch (\Exception $e) {

            $arr = array('Mensaje' => 'Error interno en el servidor o no se puede acceder a la base de datos');

            return response(json_encode($arr), 500);

        }

    }
}
