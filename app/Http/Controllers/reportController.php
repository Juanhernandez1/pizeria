<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class reportController extends Controller
{
    /**
     * Display the specified resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function showFrecuente()
    {
        $results = $results = DB::select(DB::raw("SELECT
    COUNT(users.id) as frecuente, users.id , users.nombre
FROM
    peidos_pizzas
        JOIN
    users ON users.id = peidos_pizzas.users_id
GROUP BY users.id
ORDER BY frecuente DESC"));

        return $results;
    }

    /**
     * Display the specified resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function showClinteMasGasta()
    {
        $results = $results = DB::select(DB::raw("SELECT
users.id,
 users.nombre,
    AVG(peidos_pizzas.total) as promedio
FROM
    peidos_pizzas
        JOIN
    users ON users.id = peidos_pizzas.users_id
GROUP BY users.id
ORDER BY promedio desc"));

        return $results;
    }

    /**
     * Display the specified resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function showIngredientePopular()
    {
        $results = $results = DB::select(DB::raw("SELECT id, ingrediente,popularida FROM ingredientes order by popularida desc;"));

        return $results;

    }
}
