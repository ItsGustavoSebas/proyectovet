<?php

namespace App\Observers;

use App\Models\Consulta;
use App\Models\TratamientoDeLaConsulta;
use App\Models\TratamientoMascota;
use Carbon\Carbon;

class TratamientoDeLaConsultaObserver
{
    public function created(TratamientoDeLaConsulta $tratamientoDeLaConsulta)
    {
        $tratamientoMascota = TratamientoMascota::find($tratamientoDeLaConsulta->ID_TratamientoMascota);

        if ($tratamientoMascota) {
            $tratamientoMascota->visitas_realizadas += 1;
            $frecuencia = $tratamientoMascota->frecuencia; 
            $tratamientoMascota->SiguienteVisita = Carbon::now()->addDays($frecuencia);
            $tratamientoMascota->save();
        }

        $Consulta = Consulta::find($tratamientoDeLaConsulta->ID_Consulta);
        if ($Consulta) {
            $Consulta -> MontoTotal += $tratamientoDeLaConsulta->precio;
            $Consulta->save();
        }
    }
    public function deleted(TratamientoDeLaConsulta $tratamientoDeLaConsulta)
    {
        $tratamientoMascota = TratamientoMascota::find($tratamientoDeLaConsulta->ID_TratamientoMascota);
        if ($tratamientoMascota && $tratamientoMascota->visitas_realizadas > 0) {
            $tratamientoMascota->visitas_realizadas -= 1;
            $tratamientoMascota->save();
        }
        $Consulta = Consulta::find($tratamientoDeLaConsulta->ID_Consulta);
        if ($Consulta) {
            $Consulta -> MontoTotal -= $tratamientoDeLaConsulta->precio;
            $Consulta->save();
        }
    }
}
