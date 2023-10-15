<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Servicio;


class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Servicio::create([         
            


            'nombre' => 'Grooming',
            'descripcion' => 'Un baño para todo tipo de mascotas',
            'precio' => '100',
            'reservable' => 'Si',
            'ruta_imagen' => '/storage/imagenes/utilitarios/1697388399_Grooming2.jpg'
           
        ]);

        Servicio::create([
            'nombre' => 'Atención dental',
            'descripcion' => 'Revisión dental para las mascotas',
            'precio' => '150',
            'reservable' => 'Si',
            'ruta_imagen' => '/storage/imagenes/utilitarios/1697352426_Dental.jpg'
        ]);

    }
}
