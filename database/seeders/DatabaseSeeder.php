<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(ProfileSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(EstadosSeeder::class);
        $this->call(CategoriasSeeder::class);
        $this->call(SucursalesSeeder::class);
        $this->call(ProductosSeeder::class);
    }
}
