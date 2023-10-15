<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Gustavo Camargo',
            'email' => 'user@gmail.com',
            'ci' => '14011629',
            'telefono' => '63580939',
            'direccion' => 'plan 3000',
            'password' => bcrypt('12345678')
        ]);

        User::create([
            'name' => 'Juan Perez',
            'email' => 'user1@gmail.com',
            'ci' => '21322324',
            'telefono' => '63569092',
            'direccion' => 'villa primero de mayo',
            'password' => bcrypt('12345678')
        ]);

        User::create([
            'name' => 'Ana Vedia',
            'email' => 'user2@gmail.com',
            'ci' => '2135624',
            'telefono' => '63567892',
            'direccion' => 'villa primero de mayo',
            'password' => bcrypt('12345678')
        ]);

        User::create([
            'name' => 'Luis Martinez',
            'email' => 'user3@gmail.com',
            'ci' => '21322454',
            'telefono' => '65678963',
            'direccion' => 'villa primero de mayo',
            'password' => bcrypt('12345678')
        ]);
    }
}
