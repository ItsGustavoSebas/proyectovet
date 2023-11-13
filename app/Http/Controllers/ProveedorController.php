<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function inicio()
    {
        $proveedores = Proveedor::all();
        return (view('proveedor.inicio', compact('proveedores')));
    }

    public function crear()
    {
        return view('proveedor.crear');
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

        return redirect(route('proveedor.inicio'))->with('creado', 'Proveedor creado exitosamente');
    }

    public function editar($id)
    {
        $proveedor = Proveedor::where('id', '=', $id)->first();
        return view('proveedor.editar', compact('proveedor'));
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
        return redirect(route('proveedor.inicio'))->with('actualizado', 'Proveedor actualizado exitosamente');
    }

    public function eliminar($id)
    {
        $proveedor = Proveedor::where('id', '=', $id)->first();
        $nombre = $proveedor->nombre;
        $proveedor->delete();
        return redirect(route('proveedor.inicio'))->with('eliminado', 'Proveedor ' . $nombre . 'eliminado exitosamente');
    }
}
