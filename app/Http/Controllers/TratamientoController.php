<?php

namespace App\Http\Controllers;

use App\Models\Tratamiento;
use Illuminate\Http\Request;

class TratamientoController extends Controller
{
    public function inicio(){
        $tratamientos = Tratamiento::all();
        return(view('tratamientos.inicio', compact('tratamientos')));
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
        
        return redirect(route('tratamientos.inicio'))->with('actualizado', 'Tratamiento actualizado exitosamente');
    }

    public function eliminar($id)
    {
        $tratamiento = Tratamiento::where('id', '=', $id)->first();
        $nombre = $tratamiento->nombre;
        $tratamiento->delete();
        return redirect(route('tratamientos.inicio'))->with('eliminado', 'Tratamiento ' . $nombre . ' eliminado exitosamente');
    }
}
