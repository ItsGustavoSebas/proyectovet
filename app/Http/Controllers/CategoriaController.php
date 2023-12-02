<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    //
    public function inicio()
    {
        $categorias = Categoria::all();
        return (view('3_Inventario_Y_Productos.categorias.inicio', compact('categorias')));
    }
    public function crear()
    {
        return view('3_Inventario_Y_Productos.categorias.crear');
    }
    public function editar($id)
    {
        $categoria = Categoria::where('id', '=', $id)->first();
        return view('3_Inventario_Y_Productos.categorias.editar', compact('categoria'));
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

        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Crear Categoria',
                'metodo' => $request->method(),
                'hora' => $horaActual,
                'tabla' => 'categoria',
                'registroId' => $categoria->id,
                'ruta'=> request()->fullurl(),
            ]);
        }

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

        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Editar Categoria',
                'metodo' => $request->method(),
                'hora' => $horaActual,
                'tabla' => 'categoria',
                'registroId' => $categoria->id,
                'ruta'=> request()->fullurl(),
            ]);
        }
        
        return redirect(route('categorias.inicio'))->with('actualizado', 'Categoria actualizada exitosamente');
    }

    public function eliminar($id)
    {
        $categoria = Categoria::where('id', '=', $id)->first();
        $Nombre = $categoria->Nombre;
        $categoria->delete();

        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Eliminar Categoria',
                'metodo' => request()->method(),
                'hora' => $horaActual,
                'tabla' => 'categoria',
                'registroId' => $id,
                'ruta'=> request()->fullurl(),
            ]);
        }
        return redirect(route('categorias.inicio'))->with('Eliminado', 'Categoria ' . $Nombre . ' eliminada exitosamente');
    }
}
