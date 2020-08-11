<?php

use Illuminate\Database\Seeder;
use App\ingredientes;

class IngredientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ingredientes::insert([
    ['ingrediente' => 'Peperoni', 'precio' => 0.95, 'popularida'=> 0  ,'estado'=>"Activo"],
    ['ingrediente' => 'Cebolla', 'precio' => 0.45, 'popularida'=> 0 ,'estado'=>"Activo"],
    ['ingrediente' => 'Pimiento', 'precio' => 0.55, 'popularida'=> 0 ,'estado'=>"Activo"],
    ['ingrediente' => 'Jamon', 'precio' => 0.75, 'popularida'=> 0 ,'estado'=>"Activo"],
    ['ingrediente' => 'Salami', 'precio' => 1.15, 'popularida'=> 0 ,'estado'=>"Activo"],
    ['ingrediente' => 'Hongos', 'precio' => 1.05, 'popularida'=> 0 ,'estado'=>"Activo"],
    ['ingrediente' => 'Tocino', 'precio' => 0.85, 'popularida'=> 0 ,'estado'=>"Activo"],
    ['ingrediente' => 'Aceitunas', 'precio' => 0.75, 'popularida'=> 0 ,'estado'=>"Activo"],
    ['ingrediente' => 'Salchicha de Res', 'precio' => 0.85, 'popularida'=> 0 ,'estado'=>"Activo"],
    ['ingrediente' => 'piña', 'precio' => 0.95, 'popularida'=> 0 ,'estado'=>"Activo"],
    ['ingrediente' => 'Extra queso', 'precio' => 0.65, 'popularida'=> 0 ,'estado'=>"Activo"],
    ['ingrediente' => 'Extra Salsa', 'precio' => 0.75, 'popularida'=> 0 ,'estado'=>"Activo"],
    ['ingrediente' => 'Pollo', 'precio' => 0.95, 'popularida'=> 0 ,'estado'=>"Activo"],
    ['ingrediente' => 'Salchicha Italian', 'precio' => 0.95, 'popularida'=> 0 ,'estado'=>"Activo"],
]);

    }
}
