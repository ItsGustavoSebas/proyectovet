<?php

namespace Database\Seeders;

use App\Models\Raza;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RazaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Raza::create([
            'nombre' => 'Labrador',
            'descripcion' => 'Raza de perro conocida por su amabilidad y energía.'
        ]);
        Raza::create([
            'nombre' => 'Bulldog',
            'descripcion' => 'Raza de perro de temperamento tranquilo y aspecto distintivo.'
        ]);
        Raza::create([
            'nombre' => 'Siamés',
            'descripcion' => 'Raza de gato elegante y vocal con un pelaje distintivo.'
        ]);
        Raza::create([
            'nombre' => 'Persa',
            'descripcion' => 'Raza de gato de pelo largo y temperamento tranquilo.'
        ]);
        Raza::create([
            'nombre' => 'Canario',
            'descripcion' => 'Ave canora de colores brillantes y canto melodioso.'
        ]);
        Raza::create([
            'nombre' => 'Perico',
            'descripcion' => 'Ave parlante de plumaje vibrante y personalidad inteligente.'
        ]);
        
    }
}
