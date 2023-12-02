<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function inicio()
    {
        $proveedores = Proveedor::all();
        return (view('3_Inventario_Y_Productos.proveedor.inicio', compact('proveedores')));
    }

    public function crear()
    {
        return view('3_Inventario_Y_Productos.proveedor.crear');
    }

    public function guardar(REQUEST $request)
    {
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required',
            'telefono' => 'required',
        ]);
        $proveedor = new Proveedor();
        $proveedor->nombre = $request->nombre;
        $proveedor->correo = $request->correo;
        $proveedor->telefono = $request->telefono;
        $proveedor->direccion = $request->direccion;
        $proveedor->save();

        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Crear Proveedor',
                'metodo' => $request->method(),
                'hora' => $horaActual,
                'tabla' => 'proveedor',
                'registroId' => $proveedor->id,
                'ruta'=> request()->fullurl(),
            ]);
        }

        return redirect(route('proveedor.inicio'))->with('creado', 'Proveedor creado exitosamente');
    }

    public function editar($id)
    {
        $proveedor = Proveedor::where('id', '=', $id)->first();
        return view('3_Inventario_Y_Productos.proveedor.editar', compact('proveedor'));
    }

    public function actualizar(REQUEST $request, $id)
    {
        $proveedor = Proveedor::where('id', '=', $id)->first();
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required',
            'telefono' => 'required',
        ]);
        $proveedor->nombre = $request->nombre;
        $proveedor->correo = $request->correo;
        $proveedor->telefono = $request->telefono;
        $proveedor->direccion = $request->direccion;
        $proveedor->save();

        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Editar Proveedor',
                'metodo' => $request->method(),
                'hora' => $horaActual,
                'tabla' => 'proveedor',
                'registroId' => $proveedor->id,
                'ruta'=> request()->fullurl(),
            ]);
        }

        return redirect(route('proveedor.inicio'))->with('actualizado', 'Proveedor actualizado exitosamente');
    }

    public function eliminar($id)
    {
        $proveedor = Proveedor::where('id', '=', $id)->first();
        $nombre = $proveedor->nombre;
        $proveedor->delete();

        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Eliminar Proveedor',
                'metodo' => request()->method(),
                'hora' => $horaActual,
                'tabla' => 'proveedor',
                'registroId' => $id,
                'ruta'=> request()->fullurl(),
            ]);
        }

        return redirect(route('proveedor.inicio'))->with('eliminado', 'Proveedor ' . $nombre . 'eliminado exitosamente');
    }
}
