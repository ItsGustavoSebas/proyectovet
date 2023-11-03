<?php

namespace Database\Seeders;

use App\Models\Lote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lote::create([
            'numeroLote' => 'Lote001',
            'fechaCompra' => '2023-05-10',
            'fechaVencimiento' => '2024-05-10',
            'ID_Proveedor' => '1',
        ]);
        
        Lote::create([
            'numeroLote' => 'Lote002',
            'fechaCompra' => '2023-05-10',
            'fechaVencimiento' => '2024-05-10',
            'ID_Proveedor' => '2',
        ]);
        
    }
}
