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
            'nombre' => 'HealthyPet'
        ]);
        Marca::create([
            'nombre' => 'VetMed'
        ]);
        Marca::create([
            'nombre' => 'PawClean'
        ]);
        Marca::create([
            'nombre' => 'PetPlay'
        ]);
        Marca::create([
            'nombre' => 'ComfyPaws'
        ]);
        Marca::create([
            'nombre' => 'WhiskerWellness'
        ]);
        Marca::create([
            'nombre' => 'HealPaws'
        ]);
        Marca::create([
            'nombre' => 'FurryFun'
        ]);
        Marca::create([
            'nombre' => 'CozyCritter'
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
            'nombre' => 'Royal Canin'
        ]);
        Marca::create([
            'nombre' => 'Hill\'s Science Diet.'
        ]);
        Marca::create([
            'nombre' => 'Cute Cat'
        ]);
        Marca::create([
            'nombre' => 'Bento Pet'
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
        Marca::create([
            'nombre' => 'PawCare Inflam-Relief'
        ]);
        Marca::create([
            'nombre' => 'GuardPet ParasiteShield'
        ]);
        Marca::create([
            'nombre' => 'ComfortVet PainEze'
        ]);
        Marca::create([
            'nombre' => 'VitaPaws HealthBoost'
        ]);
        Marca::create([
            'nombre' => 'FeatherClear RespiraCare'
        ]);
    }
}
