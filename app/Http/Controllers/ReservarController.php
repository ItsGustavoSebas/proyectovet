<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;

class ReservarController extends Controller



{
    public function obtenerHorasReservadas($fechaProgramada)
    {
    // Filtra todas las citas de la base de datos por la fechaProgramada proporcionada
    $citas = Cita::whereDate('fechaProgramada', $fechaProgramada)->get();

    // Inicializa un array para almacenar las horas reservadas
    $horasReservadas = [];

    // Itera sobre cada cita y extrae la hora
    foreach ($citas as $cita) {
        $horasReservadas[] = $cita->hora;
    }

    return $horasReservadas;
    

    }
    public function inicio(){


        return view('reservar.inicio');

    }
}
