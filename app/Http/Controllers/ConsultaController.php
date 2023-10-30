<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Cliente;
use App\Models\Consulta;
use App\Models\Mascota;
use App\Models\TratamientoDeLaConsulta;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function inicio($id_Cita)
    {
        $cita = Cita::where('id', '=', $id_Cita)->first();
        $ID_Cliente = $cita->ID_Cliente;
        $mascotas = Mascota::where('ID_Cliente', '=', $ID_Cliente)->get();
        $idEmpleado = auth()->id();
        return view('consulta.inicio', compact('cita', 'mascotas', 'idEmpleado'));
    }

    public function guardar(REQUEST $request)
    {
        $request->validate([
            'Fecha' => 'required',
            'Motivo' => 'required',
            'MontoTotal' => 'required',
            'Observacion' => 'required',
            'ID_Cita' => 'required',
            'ID_Empleado' => 'required',
            'ID_Mascota' => 'required',
        ]);
        $consulta = new Consulta();
        $consulta->Fecha = $request->Fecha;
        $consulta->Motivo = $request->Motivo;
        $consulta->MontoTotal = $request->MontoTotal;
        $consulta->Observacion = $request->Observacion;
        $consulta->ID_Cita = $request->ID_Cita;
        $consulta->ID_Empleado = $request->ID_Empleado;
        $consulta->ID_Mascota = $request->ID_Mascota;
        $consulta->save();
        return redirect(route('consulta.acciones', $consulta->id))->with('creada', 'Consulta añadida exitosamente');
    }

    public function acciones($ID_Consulta)
    {
        $consulta = Consulta::where('id', '=', $ID_Consulta)->first();
        $mascota = Mascota::where('id', '=', $consulta->ID_Mascota)->first();
        $tratamientos = TratamientoDeLaConsulta::where('ID_Consulta', '=', $ID_Consulta)->get();
        return view('consulta.acciones', compact('mascota', 'consulta', 'tratamientos'));
    }
}