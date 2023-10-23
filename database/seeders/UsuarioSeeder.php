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
        //crear clientes
        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'ci' => '1213223',
            'telefono' => '13233423',
            'direccion' => 'plan 3000',
            'rol' => 'cliente',
            'password' => bcrypt('12345678')
        ]);

        User::create([
            'name' => 'cliente',
            'email' => 'user1@gmail.com',
            'ci' => '21322324',
            'telefono' => '63569092',
            'direccion' => 'villa primero de mayo',
            'rol' => 'cliente',
            'password' => bcrypt('12345678')
        ]);

        User::create([
            'name' => 'Juan Robles',
            'email' => 'user2@gmail.com',
            'ci' => '2135624',
            'telefono' => '63567892',
            'direccion' => 'villa primero de mayo',
            'rol' => 'cliente',
            'password' => bcrypt('12345678')
        ]);

        User::create([
            'name' => 'Luis Martinez',
            'email' => 'user3@gmail.com',
            'ci' => '21322454',
            'telefono' => '65678963',
            'direccion' => 'villa primero de mayo',
            'rol' => 'cliente',
            'password' => bcrypt('12345678')
        ]);

        //crear empleados
        User::create([
            'name' => 'Gustavo Camargo',
            'email' => 'empleado@gmail.com',
            'ci' => '14011629',
            'telefono' => '63580939',
            'direccion' => 'plan 3000',
            'rol' => 'empleado',
            'salario' => '500',
            'profile_photo_path' => '/build/imagenes/utilitarios/veterinario.jpg',
            'password' => bcrypt('12345678')
        ]);

        User::create([
            'name' => 'Juan Perez',
            'email' => 'empleado2@gmail.com',
            'ci' => '23234',
            'telefono' => '68788930',
            'direccion' => 'villa primero de mayo',
            'rol' => 'empleado',
            'salario' => '3000',
            'profile_photo_path' => '/build/imagenes/utilitarios/veterinario1.jpg',
            'password' => bcrypt('12345678')
        ]);

        User::create([
            'name' => 'Ana Vedia',
            'email' => 'empleado3@gmail.com',
            'ci' => '21356244',
            'telefono' => '34546543',
            'direccion' => 'villa primero de mayo',
            'rol' => 'empleado',
            'salario' => '2500',
            'profile_photo_path' => '/build/imagenes/utilitarios/veterinario2.jpg',
            'password' => bcrypt('12345678')
        ]);

    }
}
