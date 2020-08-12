<?php

use Illuminate\Database\Seeder;
use App\menuPizzas;

class MenuPizzasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        menuPizzas::insert([
    ['nombre' => 'Peperoni', 'ingredientes' => "[1]", 'precio' => 5.00,'estado'=>"Activo"],
     ['nombre' => 'jamon', 'ingredientes' => "[4]", 'precio' => 5.00,'estado'=>"Activo"],
    ['nombre' => 'hawaiana', 'ingredientes' => "[4,10,2]", 'precio' => 8.50,'estado'=>"Activo"],
    ['nombre' => 'Suprema', 'ingredientes' => "[1,9,2,3,6]", 'precio' => 14.25,'estado'=>"Activo"],
    ['nombre' => 'hawaiana Suprema', 'ingredientes' => "[4,2,10,1]", 'precio' => 12.00,'estado'=>"Activo"],
    ['nombre' => 'carnibora', 'ingredientes' => "[1,4,5,7,9,13,14]", 'precio' => 24.00,'estado'=>"Activo"],

]);

    }
}
