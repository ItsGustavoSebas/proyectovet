<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'Nombre' => 'Alimentación',
            'Descripcion' => 'Productos relacionados con la alimentación de mascotas.'
        ]);

        Categoria::create([
            'Nombre' => 'Medicamentos',
            'Descripcion' => 'Medicamentos y tratamientos para mascotas.'
        ]);

        Categoria::create([
            'Nombre' => 'Higiene',
            'Descripcion' => 'Productos de higiene para mascotas.'
        ]);
        Categoria::create([
            'Nombre' => 'Aseo',
            'Descripcion' => 'Productos de aseo para mascotas.'
        ]);
    }
}
