<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use App\Models\Mascota;
use App\Models\Tratamiento;
use App\Models\TratamientoDeLaConsulta;
use App\Models\TratamientoMascota;
use Illuminate\Http\Request;

class HistorialController extends Controller
{
    public function inicio($id)
    {
        $mascota = Mascota::where('id', '=', $id)->first();
        $historial = Historial::where('id', '=', $mascota->ID_Historial)->first();
        $tratamientos = TratamientoMascota::where('ID_Historial', '=', $mascota->ID_Historial)->get();
        return view('historial.inicio', compact('historial', 'tratamientos', 'mascota'));
    }

    public function crear($id_Historial)
    {
        $tratamientos = Tratamiento::all();
        $historial = Historial::where('id', '=', $id_Historial)->first();
        return view('historial.crear', compact('historial', 'tratamientos'));
    }

    public function guardar(REQUEST $request)
    {
        $request->validate([
            'duracion' => 'required',
            'FechaInicio' => 'required',
            'dosis_totales' => 'required',
            'frecuencia' => 'required',
            'ID_Tratamiento' => 'required',
            'ID_Historial' => 'required',
        ]);
        $TratamientoMascota = new TratamientoMascota();
        $TratamientoMascota->duracion = $request->duracion;
        $TratamientoMascota->FechaInicio = $request->FechaInicio;
        $TratamientoMascota->FechaFin = $request->FechaFin;
        $TratamientoMascota->SiguienteVisita = $request->SiguienteVisita;
        $TratamientoMascota->visitas_realizadas = 0;
        $TratamientoMascota->dosis_totales = $request->dosis_totales;
        $TratamientoMascota->frecuencia = $request->frecuencia;
        $TratamientoMascota->ID_Tratamiento = $request->ID_Tratamiento;
        $TratamientoMascota->ID_Historial = $request->ID_Historial;
        $TratamientoMascota->save();
        return redirect(route('historial.inicio', $TratamientoMascota->historial->id))->with('creado', 'Tratamiento creado exitosamente');
    
    }

    public function editar($id)
    {
        $traconsulta = TratamientoMascota::where('id', $id)->first();
        $tratamientos = Tratamiento::all();
        return view('historial.editar', compact('traconsulta', 'tratamientos'));
    }

    public function eliminar($id)
    {
        $traconsulta = TratamientoMascota::where('id', $id)->first();
        $ID_Mascota = $traconsulta->historial->mascota;
        $traconsulta->delete();
        return redirect(route('historial.inicio', $traconsulta->historial))->with('eliminado', 'Tratamiento eliminado exitosamente');
    }

    public function actualizar(REQUEST $request, $id)
    {
        $request->validate([
            'duracion' => 'required',
            'FechaInicio' => 'required',
            'ID_Tratamiento' => 'required',
            'visitas_realizadas' => 'required',
            'dosis_totales' => 'required',
            'frecuencia' => 'required',
            'ID_Historial' => 'required',
        ]);
        $TratamientoMascota = TratamientoMascota::where('id', $id)->first();
        $TratamientoMascota->duracion = $request->duracion;
        $TratamientoMascota->FechaInicio = $request->FechaInicio;
        $TratamientoMascota->FechaFin = $request->FechaFin;
        $TratamientoMascota->SiguienteVisita = $request->SiguienteVisita;
        $TratamientoMascota->visitas_realizadas = $request->visitas_realizadas;
        $TratamientoMascota->dosis_totales = $request->dosis_totales;
        $TratamientoMascota->frecuencia = $request->frecuencia;
        $TratamientoMascota->ID_Tratamiento = $request->ID_Tratamiento;
        $TratamientoMascota->ID_Historial = $request->ID_Historial;
        $TratamientoMascota->save();
        return redirect(route('historial.inicio', $TratamientoMascota->historial))->with('actualizado', 'Tratamiento actualizado exitosamente');
    }
}
