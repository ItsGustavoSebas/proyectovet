<?php

namespace Database\Seeders;

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
        Mascota::create([         
            'nombre' => 'Max',
            'sexo' => 'M',
            'color' => 'Negro',
            'fechaNacimiento' => '2020-04-15',
            'edad' => 3,
            'esterilizado' => true,
            'ID_Cliente' => 1, 
            'ID_Especie' => 1, 
            'ID_Raza' => 1, 
        ]);
        
        Mascota::create([         
            'nombre' => 'Whiskers',
            'sexo' => 'H',
            'color' => 'Gris',
            'fechaNacimiento' => '2019-07-20',
            'edad' => 4,
            'esterilizado' => false,
            'ID_Cliente' => 2, 
            'ID_Especie' => 2, 
            'ID_Raza' => 2, 
        ]);
        
        Mascota::create([         
            'nombre' => 'Rio',
            'sexo' => 'M',
            'color' => 'Amarillo',
            'fechaNacimiento' => '2018-05-10',
            'edad' => 5,
            'esterilizado' => true,
            'ID_Cliente' => 3, 
            'ID_Especie' => 3, 
            'ID_Raza' => 3, 
        ]);
        
    }
}
