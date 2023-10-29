<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(RoleSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(ServicioSeeder::class);
        $this->call(EspecieSeeder::class);
        $this->call(RazaSeeder::class);
        $this->call(MascotaSeeder::class);
        $this->call(TratamientoSeeder::class);
        $this->call(EmpleadoSeeder::class);
        $this->call(ClienteSeeder::class);
    }
}
