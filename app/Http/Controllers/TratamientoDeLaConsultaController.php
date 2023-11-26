<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Consulta;
use App\Models\Mascota;
use App\Models\Tratamiento;
use App\Models\TratamientoDeLaConsulta;
use App\Models\TratamientoMascota;
use Barryvdh\DomPDF\Facade\Pdf;
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
        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Crear Tratamiento De Mascota',
                'metodo' => $request->method(),
                'hora' => $horaActual,
                'tabla' => 'tratamientos_mascota',
                'registroId' => $TratamientoMascota->id,
                'ruta' => request()->fullurl(),
            ]);
        }
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
        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Eliminar Tratamiento De Mascota',
                'metodo' => request()->method(),
                'hora' => $horaActual,
                'tabla' => 'tratamientos_mascota',
                'registroId' => $id,
                'ruta' => request()->fullurl(),
            ]);
        }
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
        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Editar Tratamiento De Mascota',
                'metodo' => $request->method(),
                'hora' => $horaActual,
                'tabla' => 'tratamientos_mascota',
                'registroId' => $TratamientoMascota->id,
                'ruta' => request()->fullurl(),
            ]);
        }
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
        $tratamientoConsulta = new TratamientoDeLaConsulta();
        $tratamientoConsulta->fecha = $request->fecha;
        $tratamientoConsulta->precio = $request->precio;
        $tratamientoConsulta->ID_TratamientoMascota = $request->ID_Tratamiento;
        $tratamientoConsulta->ID_Consulta = $request->ID_Consulta;
        $tratamientoConsulta->save();
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
                'registroId' => $tratamientoConsulta->id,
                'ruta' => request()->fullurl(),
            ]);
        }
        return redirect()->back()->with('creado', 'Tratamiento añadido a la consulta exitosamente a la consulta');
    }

    public function eliminarTratamiento($id)
    {
        $tratamientoConsulta = TratamientoDeLaConsulta::where('id', $id)->first();
        $tratamientoConsulta->delete();
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
                'ruta' => request()->fullurl(),
            ]);
        }
        return redirect()->back()->with('eliminado', 'Tratamiento eliminado de la consulta exitosamente a la consulta');
    }

    public function generarTratamientosConsultaPDF($ID_Consulta){
        $consulta = Consulta::where('id', '=', $ID_Consulta)->first();
        $mascota = Mascota::where('id', '=', $consulta->ID_Mascota)->first();
        $tratamientos_consulta = TratamientoDeLaConsulta::where('ID_Consulta', '=', $ID_Consulta)->get();
        $data = [
            'tratamientos_consulta' => $tratamientos_consulta,
            'mascota' => $mascota,
        ];

        $pdf = Pdf::loadView('PDF.tratamiento_consulta', $data);

        return $pdf->stream('Tratamientos-mascota.pdf');
    }
}
