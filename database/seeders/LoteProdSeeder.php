<?php

namespace Database\Seeders;

use App\Models\LoteProd;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoteProdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LoteProd::create([
            'ID_Lote' => 1,
            'ID_Producto' => 1,
            'cantidadComprada' => 20,
            'cantidadActual' => 20,
            'precioCompra' => 200,
            'ID_Medida' => 1, 
        ]);

        LoteProd::create([
            'ID_Lote' => 1, 
            'ID_Producto' => 2, 
            'cantidadComprada' => 15,
            'cantidadActual' => 15,
            'precioCompra' => 150,
            'ID_Medida' => 1, 
        ]);

        LoteProd::create([
            'ID_Lote' => 1, 
            'ID_Producto' => 3, 
            'cantidadComprada' => 10,
            'cantidadActual' => 10,
            'precioCompra' => 100,
            'ID_Medida' => 2, 
        ]);

        LoteProd::create([
            'ID_Lote' => 2,
            'ID_Producto' => 1,
            'cantidadComprada' => 20,
            'cantidadActual' => 20,
            'precioCompra' => 200,
            'ID_Medida' => 2, 
        ]);

        LoteProd::create([
            'ID_Lote' => 2, 
            'ID_Producto' => 2, 
            'cantidadComprada' => 15,
            'cantidadActual' => 15,
            'precioCompra' => 150,
            'ID_Medida' => 2, 
        ]);

        LoteProd::create([
            'ID_Lote' => 2, 
            'ID_Producto' => 3, 
            'cantidadComprada' => 10,
            'cantidadActual' => 10,
            'precioCompra' => 100,
            'ID_Medida' => 2, 
        ]);
    }
}
