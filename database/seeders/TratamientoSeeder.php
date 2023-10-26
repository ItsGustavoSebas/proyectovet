<?php

namespace Database\Seeders;

use App\Models\Tratamiento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TratamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tratamiento::create([
            'diagnostico' => 'Dolor de estómago',
            'descripcion' => 'Tratamiento para aliviar el dolor estomacal en mascotas.',
            'precio' => 50.00,
        ]);

        Tratamiento::create([
            'diagnostico' => 'Vacunación anual',
            'descripcion' => 'Vacunación anual para prevenir enfermedades en mascotas.',
            'precio' => 30.00,
        ]);

        Tratamiento::create([
            'diagnostico' => 'Herida en la pata',
            'descripcion' => 'Tratamiento para limpiar y curar heridas en las patas de las mascotas.',
            'precio' => 40.00,
        ]);

        Tratamiento::create([
            'diagnostico' => 'Esterilización',
            'descripcion' => 'Procedimiento de esterilización para evitar la reproducción no deseada.',
            'precio' => 100.00,
        ]);

        Tratamiento::create([
            'diagnostico' => 'Problemas de piel',
            'descripcion' => 'Tratamiento para problemas dermatológicos en mascotas.',
            'precio' => 60.00,
        ]);

        Tratamiento::create([
            'diagnostico' => 'Problemas de piel',
            'descripcion' => 'Tratamiento para problemas dermatológicos en mascotas.',
            'precio' => 60.00,
        ]);

        Tratamiento::create([
            'diagnostico' => 'Cirugía dental',
            'descripcion' => 'Procedimiento para tratar problemas dentales en mascotas.',
            'precio' => 80.00,
        ]);
    }
}
