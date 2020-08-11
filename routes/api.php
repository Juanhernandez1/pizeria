<?php

use App\Http\Middleware\CheckAuth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
Route::apiResource('login', 'loginController');
Route::post("Resgistro", 'userController@store');

Route::group(['middleware' => [CheckAuth::class]], function () {
    Route::apiResource("Ingredientes", 'IngredientesController');
    Route::apiResource("Departamentos", 'DepartamentoController');
    Route::apiResource("usuarios", 'userController');
    Route::apiResource("MenuPizzas", 'MenuPizzasController');
    Route::get("MenuPizzasview", 'MenuPizzasController@menuPizzaView');
    Route::get("MenuPizzasviewone/{id}", 'MenuPizzasController@menuPizzaViewshow');
});
