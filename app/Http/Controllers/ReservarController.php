<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Servicio;

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

    public function inicio($id)
    {

        $ID_Cliente = $id;
        return view('reservar.inicio', compact('ID_Cliente'));
    }

    public function consultar_cliente($id)
    {
        $usuario = User::where('id', '=', $id)->first();
        $citas = Cita::where('ID_Cliente', '=', $id)->where('activo', true)->get();
        return view('reservar.consultar_cliente', compact('citas', 'usuario'));
    }

    public function consultar(Request $request)
    {
        $tipo = $request->input('tipo'); 
        $citas = Cita::where('tipo', '=', $tipo)
        ->where('activo', true)->get();
        return view('reservar.consultar', compact('citas', 'tipo'));
    }




    public function eliminar($id)
    {
        $cita = Cita::where('id', '=', $id)->first();
        $cita->delete();
        return redirect(route('reservar.consultar'))->with('eliminado', 'Reserva eliminada exitosamente');
    }
}
