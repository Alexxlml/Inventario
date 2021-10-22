<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create([
            'nombre' => 'iPhone 13 Pro',
            'descripcion' => '256Gb Grafito',
            'categoria_id' => 1,
            'sucursal_id' => 1,
            'estado_id' => 1,
            'precio' => 13000,
            'fecha_compra' => Carbon::today()->isoFormat('YYYY-MM-DD'),
            'comentarios' => NULL,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Producto::create([
            'nombre' => 'Poco X3 Pro',
            'descripcion' => '256Gb Azul',
            'categoria_id' => 1,
            'sucursal_id' => 2,
            'estado_id' => 1,
            'precio' => 5300,
            'fecha_compra' => Carbon::today()->isoFormat('YYYY-MM-DD'),
            'comentarios' => NULL,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Producto::create([
            'nombre' => 'Lavadora Mabe',
            'descripcion' => 'Capacidad de 18Kg.',
            'categoria_id' => 2,
            'sucursal_id' => 1,
            'estado_id' => 1,
            'precio' => 12000,
            'fecha_compra' => Carbon::today()->isoFormat('YYYY-MM-DD'),
            'comentarios' => NULL,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
