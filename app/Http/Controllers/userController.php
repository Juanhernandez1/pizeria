<?php

namespace App\Http\Controllers;

use App\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userList = user::where('estado', 'Activo')->get();
        return $userList;

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

            $usuario = user::create($datos);
            $clave = $usuario->password;
            $usuario->password = hash('sha256', $clave);

            $usuario->save();

            return $usuario;

        } catch (\Exception $e) {
            if ($e->getCode() === "23000") {
                $arr = array('Mensaje' => 'El Correo Electronico o El nombre de Usuario ya Existe');

                return response(json_encode($arr), 403);

            } else {
                $arr = array('Mensaje' => 'Error interno en el servidor o no se puede acceder a la base de datos');

                return response(json_encode($arr), 500);

            }

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
        $usuario = user::find($id);

        if ($usuario) {
            return $usuario;
        }
        $arr = array('Mensaje' => 'Usuario No Existe');

        return response(json_encode($arr), 404);

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
        $usuario = user::find($id);

        if ($usuario) {

            if ($usuario->password == hash('sha256', $request->password)) {
                $usuario->nombre = $request->nombre;
                $usuario->username = $request->username;
                $usuario->email = $request->email;
                $usuario->departamentos_id = $request->departamentos_id;
                $usuario->direcion = $request->direcion;
                $usuario->estado = $request->estado;

                $usuario->save();

                return $usuario;
            } else {
                $usuario->nombre = $request->nombre;
                $usuario->username = $request->username;
                $usuario->email = $request->email;
                $usuario->password = hash('sha256', $request->password);
                $usuario->departamentos_id = $request->departamentos_id;
                $usuario->direcion = $request->direcion;
                $usuario->estado = $request->estado;

                $usuario->save();

                return $usuario;

            }
        }
        $arr = array('Mensaje' => 'Usuario No Existe');

        return response(json_encode($arr), 404);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = user::find($id);

        $usuario->estado = "Inactivo";
        $usuario->save();

     $arr = array('Mensaje' => 'Registro desactivado');


        return json_encode($arr);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showHisorial($id)
    {
        $users = DB::table('users')
            ->join('peidos_pizzas', 'users.id', '=', 'peidos_pizzas.users_id')
            ->select('peidos_pizzas.*')
            ->where('users.id', $id)
            ->get();

        if ($users) {
            foreach ($users as $key => $value) {
                $value->pizza = json_decode($value->pizza);
            }
            
            return $users;
        }
        $arr = array('Mensaje' => 'Usuario No Existe');

        return response(json_encode($arr), 404);

    }

}
