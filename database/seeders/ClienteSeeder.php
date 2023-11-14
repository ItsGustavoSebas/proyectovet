<?php

namespace Database\Seeders;


use App\Models\User;
use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
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
            'name' => 'user',
            'email' => 'user@gmail.com',
            'ci' => '1213223',
            'telefono' => '13233423',
            'direccion' => 'plan 3000',
            //'rol' => 'cliente',
            'cliente' => true,
            'empleado' => false,
            'password' => bcrypt('12345678')
        ])->assignRole('Cliente');

        $cliente = new Cliente();
        $user->cliente()->save($cliente);

        $user = User::create([
            'name' => 'cliente',
            'email' => 'user1@gmail.com',
            'ci' => '21322324',
            'telefono' => '63569092',
            'direccion' => 'villa primero de mayo',
            //'rol' => 'cliente',
            'cliente' => true,
            'empleado' => false,
            'password' => bcrypt('12345678')
        ])->assignRole('Cliente');

        $cliente = new Cliente();
        $user->cliente()->save($cliente);

        $user = User::create([
            'name' => 'Juan Robles',
            'email' => 'user2@gmail.com',
            'ci' => '2135624',
            'telefono' => '63567892',
            'direccion' => 'villa primero de mayo',
            //'rol' => 'cliente',
            'cliente' => true,
            'empleado' => false,
            'password' => bcrypt('12345678')
        ])->assignRole('Cliente');

        $cliente = new Cliente();
        $user->cliente()->save($cliente);

        $user = User::create([
            'name' => 'Luis Martinez',
            'email' => 'user3@gmail.com',
            'ci' => '21322454',
            'telefono' => '65678963',
            'direccion' => 'villa primero de mayo',
            //'rol' => 'cliente',
            'cliente' => true,
            'empleado' => false,
            'password' => bcrypt('12345678')
        ])->assignRole('Cliente');

        $cliente = new Cliente();
        $user->cliente()->save($cliente);
    }
}
