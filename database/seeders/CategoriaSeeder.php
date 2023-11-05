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
            'nombre' => 'Alimentación',
            'descripcion' => 'Productos relacionados con la alimentación de mascotas.',
        ]);

        Categoria::create([
            'nombre' => 'Medicamentos',
            'descripcion' => 'Medicamentos y tratamientos para mascotas.',
        ]);

        Categoria::create([
            'nombre' => 'Higiene',
            'descripcion' => 'Productos de higiene para mascotas.',
        ]);

    }
}