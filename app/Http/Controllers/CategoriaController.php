<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    //
    public function inicio()
    {
        $categorias = Categoria::all();
        return (view('categorias.inicio', compact('categorias')));
    }
    public function crear()
    {
        return view('categorias.crear');
    }
    public function editar($id)
    {
        $categoria = Categoria::where('id', '=', $id)->first();
        return view('categorias.editar', compact('categoria'));
    }
    public function guardar(REQUEST $request)
    {
        $request->validate([
            'Nombre' => 'required',
            'Descripcion' => 'required'
        ]);
        $categoria = new Categoria();
        $categoria->Nombre = $request->Nombre;
        $categoria->Descripcion = $request->Descripcion;
        $categoria->save();
        return redirect(route('categorias.inicio'))->with('Creado', 'Categoria añadida exitosamente');
    }
    public function actualizar(REQUEST $request, $id)
    {
        $categoria = Categoria::where('id', '=', $id)->first();
        $request->validate([
            'Nombre' => 'required',
            'Descripcion' => 'required'
        ]);
        $categoria->Nombre = $request->Nombre;
        $categoria->Descripcion = $request->Descripcion;
        $categoria->save();
        
        return redirect(route('categorias.inicio'))->with('actualizado', 'Categoria actualizada exitosamente');
    }

    public function eliminar($id)
    {
        $categoria = Categoria::where('id', '=', $id)->first();
        $Nombre = $categoria->Nombre;
        $categoria->delete();
        return redirect(route('categorias.inicio'))->with('Eliminado', 'Categoria ' . $Nombre . ' eliminada exitosamente');
    }
}
