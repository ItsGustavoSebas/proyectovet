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
            'precioCompra' => 15.99 * 20, // Precio de venta * cantidadComprada
            'ID_Medida' => 2,
        ]);

        LoteProd::create([
            'ID_Lote' => 1,
            'ID_Producto' => 21,
            'cantidadComprada' => 7,
            'cantidadActual' => 7,
            'precioCompra' => 4.99 * 7, // Precio de venta * cantidadComprada
            'ID_Medida' => 2,
        ]);

        LoteProd::create([
            'ID_Lote' => 1,
            'ID_Producto' => 3,
            'cantidadComprada' => 10,
            'cantidadActual' => 10,
            'precioCompra' => 7.99 * 10, // Precio de venta * cantidadComprada
            'ID_Medida' => 2,
        ]);

        LoteProd::create([
            'ID_Lote' => 2,
            'ID_Producto' => 6,
            'cantidadComprada' => 20,
            'cantidadActual' => 20,
            'precioCompra' => 12.99 * 20, // Precio de venta * cantidadComprada
            'ID_Medida' => 2,
        ]);

        LoteProd::create([
            'ID_Lote' => 2,
            'ID_Producto' => 2,
            'cantidadComprada' => 15,
            'cantidadActual' => 15,
            'precioCompra' => 12.99 * 15, // Precio de venta * cantidadComprada
            'ID_Medida' => 2,
        ]);

        LoteProd::create([
            'ID_Lote' => 3,
            'ID_Producto' => 5,
            'cantidadComprada' => 10,
            'cantidadActual' => 10,
            'precioCompra' => 7.50 * 10, // Precio de venta * cantidadComprada
            'ID_Medida' => 2,
        ]);

        LoteProd::create([
            'ID_Lote' => 3,
            'ID_Producto' => 13,
            'cantidadComprada' => 10,
            'cantidadActual' => 10,
            'precioCompra' => 8.25 * 10, // Precio de venta * cantidadComprada
            'ID_Medida' => 2,
        ]);

        LoteProd::create([
            'ID_Lote' => 3,
            'ID_Producto' => 15,
            'cantidadComprada' => 10,
            'cantidadActual' => 10,
            'precioCompra' => 19.99 * 10, // Precio de venta * cantidadComprada
            'ID_Medida' => 2,
        ]);

        LoteProd::create([
            'ID_Lote' => 3,
            'ID_Producto' => 22,
            'cantidadComprada' => 10,
            'cantidadActual' => 10,
            'precioCompra' => 15.25 * 10, // Precio de venta * cantidadComprada
            'ID_Medida' => 2,
        ]);

        LoteProd::create([
            'ID_Lote' => 3,
            'ID_Producto' => 21,
            'cantidadComprada' => 10,
            'cantidadActual' => 10,
            'precioCompra' => 4.99 * 10, // Precio de venta * cantidadComprada
            'ID_Medida' => 2,
        ]);

        LoteProd::create([
            'ID_Lote' => 4,
            'ID_Producto' => 6,
            'cantidadComprada' => 10,
            'cantidadActual' => 10,
            'precioCompra' => 12.99 * 10, // Precio de venta * cantidadComprada
            'ID_Medida' => 2,
        ]);

        LoteProd::create([
            'ID_Lote' => 4,
            'ID_Producto' => 8,
            'cantidadComprada' => 10,
            'cantidadActual' => 10,
            'precioCompra' => 8.49 * 10, // Precio de venta * cantidadComprada
            'ID_Medida' => 2,
        ]);

        LoteProd::create([
            'ID_Lote' => 5,
            'ID_Producto' => 9,
            'cantidadComprada' => 10,
            'cantidadActual' => 10,
            'precioCompra' => 4.25 * 10, // Precio de venta * cantidadComprada
            'ID_Medida' => 2,
        ]);

        LoteProd::create([
            'ID_Lote' => 5,
            'ID_Producto' => 16,
            'cantidadComprada' => 10,
            'cantidadActual' => 10,
            'precioCompra' => 7.49 * 10, // Precio de venta * cantidadComprada
            'ID_Medida' => 2,
        ]);

        LoteProd::create([
            'ID_Lote' => 6,
            'ID_Producto' => 20,
            'cantidadComprada' => 10,
            'cantidadActual' => 10,
            'precioCompra' => 29.99 * 10, // Precio de venta * cantidadComprada
            'ID_Medida' => 2, 
        ]);
        
        LoteProd::create([
            'ID_Lote' => 6,
            'ID_Producto' => 18,
            'cantidadComprada' => 10,
            'cantidadActual' => 10,
            'precioCompra' => 19.99 * 10, // Precio de venta * cantidadComprada
            'ID_Medida' => 2, 
        ]);
        
        LoteProd::create([
            'ID_Lote' => 6,
            'ID_Producto' => 14,
            'cantidadComprada' => 10,
            'cantidadActual' => 10,
            'precioCompra' => 15.25 * 10, // Precio de venta * cantidadComprada
            'ID_Medida' => 2, 
        ]);

        LoteProd::create([
            'ID_Lote' => 7,
            'ID_Producto' => 4,
            'cantidadComprada' => 10,
            'cantidadActual' => 10,
            'precioCompra' => 9.99 * 10, // Precio de venta * cantidadComprada
            'ID_Medida' => 2, 
        ]);
        
        LoteProd::create([
            'ID_Lote' => 7,
            'ID_Producto' => 11,
            'cantidadComprada' => 10,
            'cantidadActual' => 10,
            'precioCompra' => 6.99 * 10, // Precio de venta * cantidadComprada
            'ID_Medida' => 2, 
        ]);
        
        LoteProd::create([
            'ID_Lote' => 7,
            'ID_Producto' => 17,
            'cantidadComprada' => 10,
            'cantidadActual' => 10,
            'precioCompra' => 5.99 * 10, // Precio de venta * cantidadComprada
            'ID_Medida' => 2, 
        ]);

        LoteProd::create([
            'ID_Lote' => 8,
            'ID_Producto' => 23,
            'cantidadComprada' => 10,
            'cantidadActual' => 10,
            'precioCompra' => 20.99 * 10, // Precio de venta * cantidadComprada
            'ID_Medida' => 2, 
        ]);

        LoteProd::create([
            'ID_Lote' => 8,
            'ID_Producto' => 24,
            'cantidadComprada' => 10,
            'cantidadActual' => 10,
            'precioCompra' => 18.50 * 10, // Precio de venta * cantidadComprada
            'ID_Medida' => 2, 
        ]);

        LoteProd::create([
            'ID_Lote' => 8,
            'ID_Producto' => 25,
            'cantidadComprada' => 10,
            'cantidadActual' => 10,
            'precioCompra' => 15.75 * 10, // Precio de venta * cantidadComprada
            'ID_Medida' => 2, 
        ]);

        LoteProd::create([
            'ID_Lote' => 8,
            'ID_Producto' => 26,
            'cantidadComprada' => 10,
            'cantidadActual' => 10,
            'precioCompra' => 12.99 * 10, // Precio de venta * cantidadComprada
            'ID_Medida' => 2, 
        ]);

        LoteProd::create([
            'ID_Lote' => 8,
            'ID_Producto' => 27,
            'cantidadComprada' => 10,
            'cantidadActual' => 10,
            'precioCompra' => 9.99 * 10, // Precio de venta * cantidadComprada
            'ID_Medida' => 2, 
        ]);
    }
}
