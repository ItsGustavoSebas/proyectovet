<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Nota_Venta;
use App\Models\Factura;


class FacturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nota = Nota_Venta::create([
            'montoTotal' => '200',
            'fecha' => Carbon::now(),
            'ID_Cliente' => '4',
            'ID_Empleado' => '2',
            'qr' => false,
        ]);

        $factura = new Factura([
            'nroFactura' => 200,
            'nit' => 1234,
        ]);

        $nota->factura()->save($factura);
    }
}
