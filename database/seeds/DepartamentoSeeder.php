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
    ['nombre' => 'Ahuachapán','estado'=>"Activo"],
    ['nombre' => 'Santa Ana','estado'=>"Activo"],
    ['nombre' => 'Sonsonate','estado'=>"Activo"],
    ['nombre' => 'Chalatenango','estado'=>"Activo"],
    ['nombre' => 'La Libertad','estado'=>"Activo"],
    ['nombre' => 'San Salvador','estado'=>"Activo"],
    ['nombre' => 'La Paz','estado'=>"Activo"],
    ['nombre' => 'Cuscatlán','estado'=>"Activo"],
    ['nombre' => 'Cabañas','estado'=>"Activo"],
    ['nombre' => 'San Vicente','estado'=>"Activo"],
    ['nombre' => 'Usulután','estado'=>"Activo"],
    ['nombre' => 'San Miguel','estado'=>"Activo"],
    ['nombre' => 'Morazán','estado'=>"Activo"],
    ['nombre' => 'La Unión','estado'=>"Activo"]
]);


    }
}
