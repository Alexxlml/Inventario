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
            'name' => 'Marco Alexis',
            'lastname' =>'Zacarias',
            'lastname2' => 'Rubio',
            'access' => 1,
            'username' => 'mazacariasr',
            'email' => 'mazacariasr@testing.com',
            'password' => bcrypt('MaryTierra1234'),
            'profile_id' => '1',
        ]);

        // ? Gestor
        User::create([
            'name' => 'Hazel Alejandro',
            'lastname' =>'Mendoza',
            'lastname2' => 'Ibañez',
            'access' => 1,
            'username' => 'haibanez',
            'email' => 'jmendoza@testing.com',
            'password' => bcrypt('MaryTierra1234'),
            'profile_id' => '2',
        ]);

        // * Capturista
        User::create([
            'name' => 'José Manuel',
            'lastname' =>'Alarcón',
            'lastname2' => 'Rodríguez',
            'access' => 1,
            'username' => 'jmalarcon',
            'email' => 'erodriguez@testing.com',
            'password' => bcrypt('MaryTierra1234'),
            'profile_id' => '3',
        ]);
    }
}
