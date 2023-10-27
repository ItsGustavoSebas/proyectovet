<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\User;
use Carbon\Carbon;

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
        $now = now();
        $citas = Cita::where('ID_Cliente', '=', $id)->where('fechaProgramada', '>', $now->toDateString()) // Filtrar por fecha mayor a la actual
        ->orWhere(function ($query) use ($now, $id) {
            $query->where('ID_Cliente', '=', $id)->where('fechaProgramada', $now->toDateString())
                ->where('hora', '>', $now->hour);
        })
        ->get();
        return view('reservar.consultar_cliente', compact('citas', 'usuario'));
    }

    public function consultar(Request $request)
    {
        $tipo = $request->input('tipo'); // Obtener el valor del campo "tipo" del formulario
        $now = now(); // Obtener la fecha y hora actual

        // Realizar la consulta para obtener las citas que coincidan con los criterios de filtrado
        $citas = Cita::where(function ($query) use ($tipo, $now) {
            $query->where('tipo', $tipo)
                ->where('fechaProgramada', '>', $now->toDateString()) // Filtrar por fecha mayor a la actual
                ->orWhere(function ($query) use ($tipo, $now) {
                    $query->where('tipo', $tipo)
                    ->where('fechaProgramada', $now->toDateString())
                        ->where('hora', '>=', $now->hour);
                });
        })->get();

        return view('reservar.consultar', ['citas' => $citas]);
    }

    public function eliminar($id)
    {
        $cita = Cita::where('id', '=', $id)->first();
        $cita->delete();
        return redirect(route('reservar.consultar'))->with('eliminado', 'Reserva eliminada exitosamente');
    }
}
