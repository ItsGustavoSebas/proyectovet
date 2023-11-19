<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Mascota;
use App\Models\Tratamiento;
use App\Models\TratamientoDeLaConsulta;
use App\Models\TratamientoMascota;
use Illuminate\Http\Request;

class TratamientoDeLaConsultaController extends Controller
{
    public function crear($id_Consulta)
    {
        $tratamientos = Tratamiento::all();
        $consulta = Consulta::where('id', '=', $id_Consulta)->first();
        return view('traconsulta.crear', compact('consulta', 'tratamientos'));
    }

    public function guardar(REQUEST $request)
    {
        $request->validate([
            'duracion' => 'required',
            'FechaInicio' => 'required',
            'dosis_totales' => 'required',
            'frecuencia' => 'required',
            'ID_Tratamiento' => 'required',
            'ID_Consulta' => 'required',
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
        return redirect(route('consulta.acciones', $request->ID_Consulta))->with('creado', 'Tratamiento añadido exitosamente');
    }

    public function editar($id, $id_Consulta)
    {
        $traconsulta = TratamientoMascota::where('id', $id)->first();
        $tratamientos = Tratamiento::all();
        $consulta = Consulta::where('id', '=', $id_Consulta)->first();
        return view('traconsulta.editar', compact('traconsulta', 'tratamientos', 'consulta'));
    }

    public function eliminar($id, $id_Consulta)
    {
        $TratamientoMascota = TratamientoMascota::where('id', $id)->first();
        $TratamientoMascota->delete();
        return redirect(route('consulta.acciones', $id_Consulta))->with('eliminado', 'Tratamiento eliminado exitosamente');
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
            'ID_Consulta' => 'required',
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
        return redirect(route('consulta.acciones', $request->ID_Consulta))->with('actualizado', 'Tratamiento actualizado exitosamente');
    }

    public function añadirTratamiento(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'precio' => 'required|numeric',
            'ID_Tratamiento' => 'required',
            'ID_Consulta' => 'required',
        ]);
        // Crear una instancia de TratamientoDeLaConsulta con los datos del formulario
        $tratamientoConsulta = new TratamientoDeLaConsulta();
        $tratamientoConsulta->fecha = $request->fecha;
        $tratamientoConsulta->precio = $request->precio;
        $tratamientoConsulta->ID_TratamientoMascota = $request->ID_Tratamiento;
        $tratamientoConsulta->ID_Consulta = $request->ID_Consulta;
        $tratamientoConsulta->save();
        
        return redirect()->back()->with('creado', 'Tratamiento añadido a la consulta exitosamente a la consulta');
    }

    public function eliminarTratamiento($id)
    {
        $tratamientoConsulta = TratamientoDeLaConsulta::where('id', $id)->first();
        $tratamientoConsulta->delete();
        return redirect()->back()->with('eliminado', 'Tratamiento eliminado de la consulta exitosamente a la consulta');
    }

}
