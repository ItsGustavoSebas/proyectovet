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
            'estado' => true,
            'ID_Proveedor' => 1,
        ]);
        
        Lote::create([
            'numeroLote' => 'Lote002',
            'fechaCompra' => '2023-06-15',
            'fechaVencimiento' => '2024-06-15',
            'estado' => true,
            'ID_Proveedor' => 2,
        ]);
        
        Lote::create([
            'numeroLote' => 'Lote003',
            'fechaCompra' => '2023-07-20',
            'fechaVencimiento' => '2024-07-20',
            'estado' => true,
            'ID_Proveedor' => 3,
        ]);

        Lote::create([
            'numeroLote' => 'Lote004',
            'fechaCompra' => '2023-08-25',
            'fechaVencimiento' => '2024-08-25',
            'estado' => true,
            'ID_Proveedor' => 1,
        ]);

        Lote::create([
            'numeroLote' => 'Lote005',
            'fechaCompra' => '2023-09-30',
            'fechaVencimiento' => '2024-09-30',
            'estado' => true,
            'ID_Proveedor' => 2,
        ]);

        Lote::create([
            'numeroLote' => 'Lote006',
            'fechaCompra' => '2023-10-05',
            'fechaVencimiento' => '2024-10-05',
            'estado' => true,
            'ID_Proveedor' => 3,
        ]);

        Lote::create([
            'numeroLote' => 'Lote007',
            'fechaCompra' => '2023-11-10',
            'fechaVencimiento' => '2024-11-10',
            'estado' => true,
            'ID_Proveedor' => 1,
        ]);

        Lote::create([
            'numeroLote' => 'Lote008',
            'fechaCompra' => '2023-09-10',
            'fechaVencimiento' => '2024-03-10',
            'estado' => true,
            'ID_Proveedor' => 1,
        ]);
    }
}
