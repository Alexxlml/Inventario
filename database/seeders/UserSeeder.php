<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ! Administrador
        User::create([
            'name' => 'Marco Zacarias',
            'email' => 'mazacariasr@testing.com',
            'password' => bcrypt('MaryTierra1234'),
            'profile_id' => '1',
        ]);

        // ? Gestor
        User::create([
            'name' => 'José Mendoza',
            'email' => 'jmendoza@testing.com',
            'password' => bcrypt('MaryTierra1234'),
            'profile_id' => '2',
        ]);

        // * Capturista
        User::create([
            'name' => 'Ernesto Rodriguez',
            'email' => 'erodriguez@testing.com',
            'password' => bcrypt('MaryTierra1234'),
            'profile_id' => '3',
        ]);
    }
}
