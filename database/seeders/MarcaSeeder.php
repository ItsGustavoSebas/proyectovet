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
        //
        Marca::create([
            'nombre' => 'Primogato'
        ]);
        Marca::create([
            'nombre' => 'Átila'
        ]);
        Marca::create([
            'nombre' => '9Lives'
        ]);
        Marca::create([
            'nombre' => 'Apolo'
        ]);
        Marca::create([
            'nombre' => 'SuperCat'
        ]);
        Marca::create([
            'nombre' => 'Primocao'
        ]);
        Marca::create([
            'nombre' => 'Eco cane'
        ]);
        Marca::create([
            'nombre' => 'Purina'
        ]);
        Marca::create([
            'nombre' => 'Podium'
        ]);
        Marca::create([
            'nombre' => 'Whiskas'
        ]);
        Marca::create([
            'nombre' => 'Mican'
        ]);
        Marca::create([
            'nombre' => 'Eukanuba'
        ]);
        Marca::create([
            'nombre' => 'Royal Canin'
        ]);
        Marca::create([
            'nombre' => 'Cute Cat'
        ]);
        Marca::create([
            'nombre' => 'Bento Pet'
        ]);
        Marca::create([
            'nombre' => 'Canada Litter'
        ]);
        Marca::create([
            'nombre' => 'Acana'
        ]);
        Marca::create([
            'nombre' => 'Grature'
        ]);
        Marca::create([
            'nombre' => 'Hantu'
        ]);
        Marca::create([
            'nombre' => 'Orijen'
        ]);
        Marca::create([
            'nombre' => 'Taste of the Wild'
        ]);
        Marca::create([
            'nombre' => 'Traveness'
        ]);       
    }
}
