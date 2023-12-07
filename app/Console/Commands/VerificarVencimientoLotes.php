<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Lote;
use Carbon\Carbon;

class VerificarVencimientoLotes extends Command
{
    protected $signature = 'lotes:verificar-vencimiento';

    protected $description = 'Verificar y actualizar el estado de los lotes próximos a vencer';

    public function handle()
    {
        $lotes = Lote::where('estado', true)->get();

        foreach ($lotes as $lote) {
            $fechaVencimiento = Carbon::parse($lote->fechaVencimiento);
            $semanaAntesVencimiento = Carbon::now()->addWeek();

            if ($fechaVencimiento->lessThanOrEqualTo($semanaAntesVencimiento)) {
                $lote->estado = false;
                $lote->save();
            }
        }

        $this->info('Se han actualizado los estados de los lotes.');
    }
}
