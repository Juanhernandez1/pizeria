<?php

namespace App\Http\Controllers;

use App\ingredientes;
use Illuminate\Http\Request;

class IngredientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $ingredientesList = ingredientes::where('estado', 'Activo')->get();
            return $ingredientesList;

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
            $ingrediente = ingredientes::create($datos);
            return $ingrediente;

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
            $ingrediente = ingredientes::find($id);

            if ($ingrediente) {
                return $ingrediente;
            }
            $arr = array('Mensaje' => 'Ingrediente No Existe');

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
            $ingrediente = ingredientes::find($id);

            if ($ingrediente) {
                $ingrediente->ingrediente = $request->ingrediente;
                $ingrediente->precio = $request->precio;
                $ingrediente->popularida = $request->popularida;
                $ingrediente->estado = $request->estado;

                $ingrediente->save();

                return $ingrediente;
            }
            $arr = array('Mensaje' => 'Ingrediente No Existe');

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
            $ingrediente = ingredientes::find($id);

            $ingrediente->estado = "Inactivo";
            $ingrediente->save();

            $arr = array('Mensaje' => 'Registro desactivado');
            json_encode($arr);

            return json_encode($arr);

        } catch (\Exception $e) {

            $arr = array('Mensaje' => 'Error interno en el servidor o no se puede acceder a la base de datos');

            return response(json_encode($arr), 500);

        }

    }
}
