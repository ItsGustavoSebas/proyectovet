<?php

namespace Database\Seeders;

use App\Models\Detalle_Venta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Detalle_Venta_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Detalle_Venta::create([
            'ID_Producto' => '2',
            'ID_Nota_Venta' => '1',
            'cantidad' => 2,
            'precio' => 32,
        ]);
    }
}
