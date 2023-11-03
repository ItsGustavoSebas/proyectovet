<?php

namespace Database\Seeders;

use App\Models\Marca;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Marca::create([
            'nombre' => 'Hill\'s Science Diet',
        ]);

        Marca::create([
            'nombre' => 'Royal Canin',
        ]);

        Marca::create([
            'nombre' => 'Purina Pro Plan',
        ]);
    }
}
