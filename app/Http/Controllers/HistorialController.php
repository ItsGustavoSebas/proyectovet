<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use App\Models\Mascota;
use App\Models\Tratamiento;
use App\Models\TratamientoDeLaConsulta;
use Illuminate\Http\Request;

class HistorialController extends Controller
{
    public function inicio($id)
    {
        $mascota = Mascota::where('id', '=', $id)->first();
        $historial = Historial::where('id', '=', $mascota->ID_Historial)->first();
        $tratamientos = TratamientoDeLaConsulta::where('ID_Historial', '=', $mascota->ID_Historial)->get();
        return view('historial.inicio', compact('historial', 'tratamientos', 'mascota'));
    }

    public function editar($id)
    {
        $traconsulta = TratamientoDeLaConsulta::where('id', $id)->first();
        $tratamientos = Tratamiento::all();
        return view('historial.editar', compact('traconsulta', 'tratamientos'));
    }

    public function eliminar($id)
    {
        $traconsulta = TratamientoDeLaConsulta::where('id', $id)->first();
        $ID_Mascota = $traconsulta->consulta->mascota;
        $traconsulta->delete();
        return redirect(route('historial.inicio', $ID_Mascota))->with('eliminado', 'Tratamiento eliminado exitosamente');
    }

    public function actualizar(REQUEST $request, $id)
    {
        $request->validate([
            'duracion' => 'required',
            'FechaInicio' => 'required',
            'ID_Tratamiento' => 'required',
            'ID_Consulta' => 'required',
            'ID_Historial' => 'required',
        ]);
        $tratamientoDeLaConsulta = TratamientoDeLaConsulta::where('id', $id)->first();
        $tratamientoDeLaConsulta->duracion = $request->duracion;
        $tratamientoDeLaConsulta->FechaInicio = $request->FechaInicio;
        $tratamientoDeLaConsulta->FechaFin = $request->FechaFin;
        $tratamientoDeLaConsulta->SiguienteVisita = $request->SiguienteVisita;
        $tratamientoDeLaConsulta->ID_Tratamiento = $request->ID_Tratamiento;
        $tratamientoDeLaConsulta->ID_Consulta = $request->ID_Consulta;
        $tratamientoDeLaConsulta->ID_Historial = $request->ID_Historial;
        $tratamientoDeLaConsulta->save();
        return redirect(route('historial.inicio', $tratamientoDeLaConsulta->consulta->mascota))->with('actualizado', 'Tratamiento actualizado exitosamente');
    }
}
