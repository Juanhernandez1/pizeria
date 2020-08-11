<?php

use Illuminate\Database\Seeder;
use App\sucursale;

class SucursaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         sucursale::insert(['departamentos_id'=>6,'direcion'=>'Metrocentro 8va etapa','telefono'=> "2222-4444", 'estado'=>"Activo" ]);
    }
}
