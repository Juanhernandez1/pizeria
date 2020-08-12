<?php

namespace App\Http\Controllers;

use App\user;
use Illuminate\Http\Request;

class loginController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $userList = user::where([
                ['username', '=', $request->username],
                ['password', '=', hash('sha256', $request->password)],
            ])->first();

            $arr = array('Mensaje' => 'Inicio de Secion Satisfactoriamente');

            return response(json_encode($arr))->cookie('Auth', json_encode(["auth" => true, "data" => $userList->id]), time() + 24 * 3600);

        } catch (\Exception $e) {

            $arr = array('Mensaje' => 'Error interno en el servidor o no se puede acceder a la base de datos');

            return response(json_encode($arr), 500);

        }

    }

}
