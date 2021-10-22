<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create(['nombre_categoria' => 'Electrónica']);
        Categoria::create(['nombre_categoria' => 'Línea Blanca']);
        Categoria::create(['nombre_categoria' => 'Deportes']);
        Categoria::create(['nombre_categoria' => 'Alimentos']);
        Categoria::create(['nombre_categoria' => 'Jardín']);
    }
}
