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
            'password' => bcrypt('12345678')
        ]);

        User::create([
            'name' => 'Juan Perez',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        User::create([
            'name' => 'Ana Vedia',
            'email' => 'user2@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        User::create([
            'name' => 'Luis Martinez',
            'email' => 'user3@gmail.com',
            'password' => bcrypt('12345678')
        ]);
    }
}
