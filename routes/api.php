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
    Route::apiResource("Pedidos", 'PeidosPizzasController');
    Route::apiResource("Sucursales", 'SucursaleController');
    // * rutas especiales
    Route::get("MenuPizzasview", 'MenuPizzasController@menuPizzaView');
    Route::get("MenuPizzasviewone/{id}", 'MenuPizzasController@menuPizzaViewshow');
    Route::get("MiHistorialPedidos/{id}", 'userController@showHisorial');
    Route::get("frecuentelista", 'reportController@showFrecuente');
    Route::get("masGastalista", 'reportController@showClinteMasGasta');
    Route::get("ingredientePopilarlist", 'reportController@showIngredientePopular');

});
