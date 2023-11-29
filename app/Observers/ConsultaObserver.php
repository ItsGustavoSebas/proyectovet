<?php

namespace App\Observers;

use App\Models\Consulta;
use App\Models\Cita;

class ConsultaObserver
{
    public function created(Consulta $consulta)
    {
        $this->actualizarPrecioCita($consulta);
    }

    public function updated(Consulta $consulta)
    {
        $this->actualizarPrecioCita($consulta);
    }

    public function deleted(Consulta $consulta)
    {
        $cita = $consulta->cita;
        $cita->montoTotal = 0; 
        $cita->activo = 1;
        $cita->save(); 
    }

    protected function actualizarPrecioCita(Consulta $consulta)
    {
        $cita = $consulta->cita;

        if ($cita) {
            $montoTotal = $consulta->MontoTotal;
            $cita->montoTotal = $montoTotal; 
            $cita->save(); 
        }
    }
}
