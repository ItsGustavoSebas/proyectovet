<?php

namespace App\Observers;

use App\Models\detalleservicio;

class DetalleServicioObserver
{
    public function created(detalleservicio $detalleservicio)
    {
        $this->actualizarPrecioCita($detalleservicio);
    }

    public function updated(detalleservicio $detalleservicio)
    {
        $this->actualizarPrecioCita($detalleservicio);
    }

    public function deleted(detalleservicio $detalleservicio)
    {
        $cita = $detalleservicio->cita;
        $cita->montoTotal = 0; 
        $cita->activo = 1;
        $cita->save(); 
    }

    protected function actualizarPrecioCita(detalleservicio $detalleservicio)
    {
        $cita = $detalleservicio->cita;

        if ($cita) {
            $montoTotal = $detalleservicio->Servicio->precio;
            $cita->montoTotal = $montoTotal; 
            $cita->save(); 
        }
    }
}
