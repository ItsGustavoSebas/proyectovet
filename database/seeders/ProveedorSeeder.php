<?php

namespace Database\Seeders;

use App\Models\Proveedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proveedor::create([
            'nombre' => 'Proveedor 1',
            'correo' => 'proveedor1@gmail.com',
            'telefono' => '78954321',
            'direccion' => '123 Calle Principal',
        ]);

        Proveedor::create([
            'nombre' => 'Proveedor 2',
            'correo' => 'proveedor2@example.com',
            'telefono' => '78523654',
            'direccion' => '456 Calle Secundaria',
        ]);

        Proveedor::create([
            'nombre' => 'Proveedor 3',
            'correo' => 'proveedor3@gmail.com',
            'telefono' => '65634326',
            'direccion' => '653 Calle Secundaria',
        ]);
    }
}
