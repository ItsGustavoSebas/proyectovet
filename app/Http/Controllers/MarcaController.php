<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function inicio(){
        return (view('marcas.inicio')) ;
    }

    public function crear()
    {
        return view('marcas.crear');
    }

    public function guardar(REQUEST $request)
    {
        $request->validate([
            'nombre' => 'required',
        ]);
        $marca = new Marca();
        $marca->nombre = $request->nombre;
        $marca->save();
        return redirect(route('marcas.inicio'))->with('creado', 'Marca creada exitosamente');
    }

    public function editar($id)
    {
        $marca = Marca::where('id', '=', $id)->first();
        return view('marcas.editar', compact('marca'));
    }

    public function actualizar(REQUEST $request, $id)
    {
        $marca = Marca::where('id', '=', $id)->first();
        $request->validate([
            'nombre' => 'required',
        ]);
        $marca->nombre = $request->nombre;
        $marca->save();
        
        return redirect(route('marcas.inicio'))->with('actualizado', 'Marca actualizada exitosamente');
    }

    public function eliminar($id)
    {
        $marca = Marca::where('id', '=', $id)->first();
        $nombre = $marca->nombre;
        $marca->delete();
        return redirect(route('marcas.inicio'))->with('eliminado', 'Marca ' . $nombre . ' eliminada exitosamente');
    }
}
