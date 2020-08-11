<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\departamento;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
  departamento::insert([
    ['nombre' => 'Ahuachapán','estado'=>"Activo",'estado'=>"Activo",'estado'=>"Activo"],
    ['nombre' => 'Santa Ana','estado'=>"Activo",'estado'=>"Activo"],
    ['nombre' => 'Sonsonate','estado'=>"Activo",'estado'=>"Activo"],
    ['nombre' => 'Chalatenango','estado'=>"Activo",'estado'=>"Activo"],
    ['nombre' => 'La Libertad','estado'=>"Activo",'estado'=>"Activo"],
    ['nombre' => 'San Salvador','estado'=>"Activo",'estado'=>"Activo"],
    ['nombre' => 'La Paz','estado'=>"Activo",'estado'=>"Activo"],
    ['nombre' => 'Cuscatlán','estado'=>"Activo",'estado'=>"Activo"],
    ['nombre' => 'Cabañas','estado'=>"Activo",'estado'=>"Activo"],
    ['nombre' => 'San Vicente','estado'=>"Activo",'estado'=>"Activo"],
    ['nombre' => 'Usulután','estado'=>"Activo",'estado'=>"Activo"],
    ['nombre' => 'San Miguel','estado'=>"Activo",'estado'=>"Activo"],
    ['nombre' => 'Morazán','estado'=>"Activo",'estado'=>"Activo"],
    ['nombre' => 'La Unión','estado'=>"Activo",'estado'=>"Activo"]
]);


    }
}
