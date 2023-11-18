<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //
    public function inicio(){
        return (view('roles.inicio')) ;
    }

    public function crear(){
        return (view('roles.crear')) ;
    }

    public function editar($id){
        return view('roles.editar', compact('id'));
    }

    public function actualizar(Request $request, $id){
        $request->validate([
            'name' => 'required|min:4|max:100',
            'permissions' => 'required'
        ]);

        $rol = Role::find($id);
        $rol->name = $request->name;
        $rol->save();
        $rol->permissions()->sync($request->permissions);

        //Crear DetalleBitacora

       $bitacora_id = session('bitacora_id');

       if ($bitacora_id) {
           $bitacora = Bitacora::find($bitacora_id);

           $horaActual = now()->format('H:i:s');

           $bitacora->detalleBitacoras()->create([
               'accion' => 'Editar Rol',
               'metodo' => request()->method(),
               'hora' => $horaActual,
               'tabla' => 'roles',
               'registroId' => $rol->id,
               'ruta'=> request()->fullurl(),
           ]);
       }

        return redirect()->route('roles.inicio', $id)->with('actualizado', "Rol Editado Correctamente");
    }

    public function eliminar($id){
        $rol = Role::find($id);
        $rol->delete();

        //Crear DetalleBitacora

       $bitacora_id = session('bitacora_id');

       if ($bitacora_id) {
           $bitacora = Bitacora::find($bitacora_id);

           $horaActual = now()->format('H:i:s');

           $bitacora->detalleBitacoras()->create([
               'accion' => 'Eliminar Rol',
               'metodo' => request()->method(),
               'hora' => $horaActual,
               'tabla' => 'roles',
               'registroId' => $id,
               'ruta'=> request()->fullurl(),
           ]);
       }

        return redirect()->route('roles.inicio')->with('eliminado', "Rol Eliminado Correctamente");
    }

}
