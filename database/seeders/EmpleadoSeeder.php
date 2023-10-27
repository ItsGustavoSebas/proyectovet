<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Empleado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::create([
            'name' => 'Ana Vedia',
            'email' => 'empleado3@gmail.com',
            'ci' => '21356244',
            'telefono' => '34546543',
            'direccion' => 'villa primero de mayo',
            //'rol' => 'empleado',
            'cliente' => false,
            'empleado' => true,
            'salario' => '2500',
            //'profile_photo_path' => '/build/imagenes/utilitarios/veterinario2.jpg',
            'password' => bcrypt('12345678')
        ]);

        $empleado = new Empleado([
            'salario' => 3000,
            'ruta_imagen_e' => null,
        ]);

        $user->empleado()->save($empleado);

        $user = User::create([
            'name' => 'Gustavo Camargo',
            'email' => 'empleado@gmail.com',
            'ci' => '14011629',
            'telefono' => '63580939',
            'direccion' => 'plan 3000',
            //'rol' => 'empleado',
            'cliente' => false,
            'empleado' => true,
            'salario' => '500',
            //'profile_photo_path' => '/build/imagenes/utilitarios/veterinario.jpg',
            'password' => bcrypt('12345678')
        ]);

        $empleado = new Empleado([
            'salario' => 4000,
            'ruta_imagen_e' => null,
        ]);

        $user->empleado()->save($empleado);

        $user = User::create([
            'name' => 'Juan Perez',
            'email' => 'empleado2@gmail.com',
            'ci' => '23234',
            'telefono' => '68788930',
            'direccion' => 'villa primero de mayo',
            //'rol' => 'empleado',
            'cliente' => false,
            'empleado' => true,
            'salario' => '3000',
            //'profile_photo_path' => '/build/imagenes/utilitarios/veterinario1.jpg',
            'password' => bcrypt('12345678')
        ]);

        $empleado = new Empleado([
            'salario' => 5000,
            'ruta_imagen_e' => null,
        ]);

        $user->empleado()->save($empleado);
    }
}
