<?php

namespace Database\Seeders;

use App\Models\Historial;
use App\Models\Mascota;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MascotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $historial1 = Historial::create([
            'peso' => 12,
            'altura' => 25,
            'observacion' => 'Mascota saludable.',
        ]);
        
        Mascota::create([
            'nombre' => 'Max',
            'sexo' => 'M',
            'color' => 'Negro',
            'fechaNacimiento' => '2020-04-15',
            'edad' => 3,
            'esterilizado' => true,
            'ID_Cliente' => 4,
            'ID_Especie' => 1,
            'ID_Raza' => 1,
            'ID_Historial' => $historial1->id,
        ]);
        
        $historial2 = Historial::create([
            'peso' => 11,
            'altura' => 22,
            'observacion' => 'Mascota en buen estado de salud.',
        ]);
        
        Mascota::create([
            'nombre' => 'Whiskers',
            'sexo' => 'H',
            'color' => 'Gris',
            'fechaNacimiento' => '2019-07-20',
            'edad' => 4,
            'esterilizado' => false,
            'ID_Cliente' => 5,
            'ID_Especie' => 2,
            'ID_Raza' => 2,
            'ID_Historial' => $historial2->id,
        ]);
        
        $historial3 = Historial::create([
            'peso' => 9,
            'altura' => 18,
            'observacion' => 'Mascota con buena salud general.',
        ]);
        
        Mascota::create([
            'nombre' => 'Rio',
            'sexo' => 'M',
            'color' => 'Amarillo',
            'fechaNacimiento' => '2018-05-10',
            'edad' => 5,
            'esterilizado' => true,
            'ID_Cliente' => 6,
            'ID_Especie' => 3,
            'ID_Raza' => 3,
            'ID_Historial' => $historial3->id,
        ]);
        
        
    }
}
