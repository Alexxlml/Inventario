<?php

namespace Database\Seeders;

use App\Models\Sucursal;
use Illuminate\Database\Seeder;

class SucursalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sucursal::create(['nombre_sucursal' => 'Cuernavaca']);
        Sucursal::create(['nombre_sucursal' => 'Yautepec']);
        Sucursal::create(['nombre_sucursal' => 'Cuautla']);
        Sucursal::create(['nombre_sucursal' => 'Acapulco']);
    }
}
