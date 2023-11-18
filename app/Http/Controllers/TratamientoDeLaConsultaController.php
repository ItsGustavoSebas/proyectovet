<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Consulta;
use App\Models\Mascota;
use App\Models\Tratamiento;
use App\Models\TratamientoDeLaConsulta;
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
            'ID_Tratamiento' => 'required',
            'ID_Consulta' => 'required',
            'ID_Historial' => 'required',
        ]);
        $traConsulta = new TratamientoDeLaConsulta();
        $traConsulta->duracion = $request->duracion;
        $traConsulta->FechaInicio = $request->FechaInicio;
        $traConsulta->FechaFin = $request->FechaFin;
        $traConsulta->SiguienteVisita = $request->SiguienteVisita;
        $traConsulta->ID_Tratamiento = $request->ID_Tratamiento;
        $traConsulta->ID_Consulta = $request->ID_Consulta;
        $traConsulta->ID_Historial = $request->ID_Historial;
        $traConsulta->save();
        
        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Crear Tratamiento De Consulta',
                'metodo' => $request->method(),
                'hora' => $horaActual,
                'tabla' => 'tratamiento_de_la_consulta',
                'registroId' => $traConsulta->id,
                'ruta'=> request()->fullurl(),
            ]);
        }

        return redirect(route('consulta.acciones', $traConsulta->ID_Consulta))->with('creado', 'Tratamiento añadido exitosamente');
    }

    public function editar($id)
    {
        $traconsulta = TratamientoDeLaConsulta::where('id', $id)->first();
        $tratamientos = Tratamiento::all();
        return view('traconsulta.editar', compact('traconsulta', 'tratamientos'));
    }

    public function eliminar($id)
    {
        $traconsulta = TratamientoDeLaConsulta::where('id', $id)->first();
        $ID_Consulta = $traconsulta->ID_Consulta;
        $traconsulta->delete();

        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Eliminar Tratamiento De Consulta',
                'metodo' => request()->method(),
                'hora' => $horaActual,
                'tabla' => 'tratamiento_de_la_consulta',
                'registroId' => $id,
                'ruta'=> request()->fullurl(),
            ]);
        }

        return redirect(route('consulta.acciones', $ID_Consulta))->with('eliminado', 'Tratamiento eliminado exitosamente');
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

        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Editar Tratamiento De Consulta',
                'metodo' => $request->method(),
                'hora' => $horaActual,
                'tabla' => 'tratamiento_de_la_consulta',
                'registroId' => $tratamientoDeLaConsulta->id,
                'ruta'=> request()->fullurl(),
            ]);
        }

        return redirect(route('consulta.acciones', $tratamientoDeLaConsulta->ID_Consulta))->with('actualizado', 'Tratamiento añadido exitosamente');
    }

}
