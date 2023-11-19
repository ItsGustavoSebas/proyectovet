<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Cita;
use App\Models\Cliente;
use App\Models\Consulta;
use App\Models\Mascota;
use App\Models\TratamientoDeLaConsulta;
use App\Models\TratamientoMascota;
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

    public function consultas()
    {
        $ID_Empleado = auth()->id();
        $consultas = Consulta::where('ID_Empleado', '=', $ID_Empleado)->get();
        return view('consulta.consultas', compact('consultas'));
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

        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Crear Consulta',
                'metodo' => $request->method(),
                'hora' => $horaActual,
                'tabla' => 'consulta',
                'registroId' => $consulta->id,
                'ruta' => request()->fullurl(),
            ]);
        }

        $cita = Cita::find($request->ID_Cita);
        $cita->update(['activo' => false]);
        return redirect(route('consulta.acciones', $consulta->id))->with('creada', 'Consulta añadida exitosamente');
    }

    public function acciones($ID_Consulta)
    {
        $consulta = Consulta::where('id', '=', $ID_Consulta)->first();
        $mascota = Mascota::where('id', '=', $consulta->ID_Mascota)->first();
        $tratamientos_consulta = TratamientoDeLaConsulta::where('ID_Consulta', '=', $ID_Consulta)->get();
        $tratamientos = TratamientoMascota::where('ID_Historial', '=', $consulta->mascota->historial->id)->whereColumn('dosis_totales', '>', 'visitas_realizadas')
            ->get();
        return view('consulta.acciones', compact('mascota', 'consulta', 'tratamientos', 'tratamientos_consulta'));
    }

    public function editar($id)
    {
        $consulta = Consulta::where('id', '=', $id)->first();
        $mascotas = Mascota::where('ID_Cliente', '=', $consulta->cita->ID_Cliente)->get();
        return view('consulta.editar', compact('consulta', 'mascotas'));
    }

    public function actualizar(REQUEST $request, $id)
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
        $consulta = Consulta::where('id', '=', $id)->first();
        $consulta->Fecha = $request->Fecha;
        $consulta->Motivo = $request->Motivo;
        $consulta->MontoTotal = $request->MontoTotal;
        $consulta->Observacion = $request->Observacion;
        $consulta->ID_Cita = $request->ID_Cita;
        $consulta->ID_Empleado = $request->ID_Empleado;
        $consulta->ID_Mascota = $request->ID_Mascota;
        $consulta->save();

        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Editar Consulta',
                'metodo' => $request->method(),
                'hora' => $horaActual,
                'tabla' => 'consulta',
                'registroId' => $consulta->id,
                'ruta' => request()->fullurl(),
            ]);
        }

        return redirect(route('consulta.consultas'))->with('actualizado', 'Consulta actualizada exitosamente');
    }

    public function eliminar($id)
    {
        $consulta = Consulta::where('id', '=', $id)->first();
        $nombre = $consulta->nombre;
        $consulta->delete();

        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Eliminar Consulta',
                'metodo' => request()->method(),
                'hora' => $horaActual,
                'tabla' => 'consulta',
                'registroId' => $id,
                'ruta' => request()->fullurl(),
            ]);
        }

        return redirect(route('consulta.consultas'))->with('eliminado', 'Consulta ' . $nombre . ' eliminada exitosamente');
    }
}
