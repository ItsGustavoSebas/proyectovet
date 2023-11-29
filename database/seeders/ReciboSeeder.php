<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Nota_Venta;
use App\Models\Recibo;

class ReciboSeeder extends Seeder
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
            'recibo' => true,
            'factura' => false,
        ]);

        $Recibo = new Recibo([
            'nroRecibo' => 200
        ]);

        $nota->Recibo()->save($Recibo);
    }
}
