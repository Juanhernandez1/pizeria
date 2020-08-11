<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeidosPizzasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peidos_pizzas', function (Blueprint $table) {
           $table->id();
           // // $table->timestamps();
$table->unsignedBigInteger('sucursales_id');

$table->foreign('sucursales_id')->references('id')->on('sucursales');

          $table->unsignedBigInteger('users_id');

          $table->foreign('users_id')->references('id')->on('users');
           // * almacena un array y para mas de 1 pizza un objeto, sera transformado en string json_encode
           // * contiene los id de los ingredientes
           // * o el id de una o mas pizza del menu 
           $table->string('pizza');
           $table->BigInteger('cantidad');
           $table->float('total');
           $table->string('estado');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peidos_pizzas');
    }
}
