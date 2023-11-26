<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Tratamiento;
use Illuminate\Http\Request;

class TratamientoController extends Controller
{
    public function inicio()
    {
        $tratamientos = Tratamiento::all();
        return (view('tratamientos.inicio', compact('tratamientos')));
    }

    public function crear()
    {
        return view('tratamientos.crear');
    }

    public function guardar(REQUEST $request)
    {
        $request->validate([
            'diagnostico' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
        ]);
        $tratamiento = new Tratamiento();
        $tratamiento->diagnostico = $request->diagnostico;
        $tratamiento->descripcion = $request->descripcion;
        $tratamiento->precio = $request->precio;
        $tratamiento->save();

        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Crear Tratamiento',
                'metodo' => $request->method(),
                'hora' => $horaActual,
                'tabla' => 'tratamiento',
                'registroId' => $tratamiento->id,
                'ruta' => request()->fullurl(),
            ]);
        }

        return redirect(route('tratamientos.inicio'))->with('creado', 'Tratamiento añadido exitosamente');
    }

    public function editar($id)
    {
        $tratamiento = Tratamiento::where('id', '=', $id)->first();
        return view('tratamientos.editar', compact('tratamiento'));
    }

    public function actualizar(REQUEST $request, $id)
    {
        $tratamiento = Tratamiento::where('id', '=', $id)->first();
        $request->validate([
            'diagnostico' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
        ]);
        $tratamiento->diagnostico = $request->diagnostico;
        $tratamiento->descripcion = $request->descripcion;
        $tratamiento->precio = $request->precio;
        $tratamiento->save();

        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Editar Tratamiento',
                'metodo' => $request->method(),
                'hora' => $horaActual,
                'tabla' => 'tratamiento',
                'registroId' => $tratamiento->id,
                'ruta' => request()->fullurl(),
            ]);
        }

        return redirect(route('tratamientos.inicio'))->with('actualizado', 'Tratamiento actualizado exitosamente');
    }

    public function eliminar($id)
    {
        $tratamiento = Tratamiento::where('id', '=', $id)->first();
        $nombre = $tratamiento->nombre;
        $tratamiento->delete();

        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Eliminar Tratamiento',
                'metodo' => request()->method(),
                'hora' => $horaActual,
                'tabla' => 'tratamiento',
                'registroId' => $id,
                'ruta' => request()->fullurl(),
            ]);
        }
        return redirect(route('tratamientos.inicio'))->with('eliminado', 'Tratamiento ' . $nombre . ' eliminado exitosamente');
    }
}

