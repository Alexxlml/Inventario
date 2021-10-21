<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::create(['name' => 'Administrador']);
        Profile::create(['name' => 'Gestor']);
        Profile::create(['name' => 'Capturista']);
    }
}
