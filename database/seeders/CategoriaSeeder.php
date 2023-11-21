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
            'Descripcion' => 'Productos para el cuidado de la higiene de las mascotas.'
        ]);
        Categoria::create([
            'Nombre' => 'Juguetes',
            'Descripcion' => 'Productos para el entretenimiento de las mascotas.'
        ]);
        Categoria::create([
            'Nombre' => 'Accesorios',
            'Descripcion' => 'Productos para el cuidado y la comodidad de las mascotas.'
        ]);
    }
}
