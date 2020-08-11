<?php

namespace App\Http\Controllers;

use App\user;

use Illuminate\Http\Request;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userList = user::where([
            ['username', '=', $request->username],
            ['password', '=', hash('sha256', $request->password)],
        ])->first();

        $arr = array('Mensaje' => 'Inicio de Secion Satisfactoriamente');

        return response(json_encode($arr))->cookie('Auth',json_encode(["auth"=>true, "data"=>$userList->id ]) , time() + 24 * 3600);

    }

   
}
