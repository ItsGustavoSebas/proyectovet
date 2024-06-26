<?php

namespace Database\Seeders;

use App\Models\Medida;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Medida::create([
            'nombre' => 'Kilogramos',
            'sigla' => 'kg',
        ]);

        Medida::create([
            'nombre' => 'Unidades',
            'sigla' => 'u',
        ]);

        Medida::create([
            'nombre' => 'Litros',
            'sigla' => 'L',
        ]);
    }
}
