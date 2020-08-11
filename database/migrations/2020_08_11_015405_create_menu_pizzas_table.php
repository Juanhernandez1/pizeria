<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuPizzasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_pizzas', function (Blueprint $table) {
            $table->id();
          // //  $table->timestamps();
          $table->string('nombre');
          // * almacena un array transformado en string json_encode el arrary contiene los id de los ingredientes
          $table->string('ingredientes'); 
          $table->float('precio');
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
        Schema::dropIfExists('menu_pizzas');
    }
}
