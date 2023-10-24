<?php

namespace Database\Seeders;

use App\Models\Especie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EspecieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Especie::create([         
            'nombre' => 'Perro',
        ]);
        Especie::create([         
            'nombre' => 'Gato',
        ]);
        Especie::create([         
            'nombre' => 'Ave',
        ]);
    }
}
