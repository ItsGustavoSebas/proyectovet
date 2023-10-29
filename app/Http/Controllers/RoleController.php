<?php

namespace App\Http\Controllers;

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
        return redirect()->route('roles.inicio', $id)->with('actualizado', "Rol Editado Correctamente");
    }

    public function eliminar($id){
        $rol = Role::find($id);
        $rol->delete();
        return redirect()->route('roles.inicio')->with('eliminado', "Rol Eliminado Correctamente");
    }

}
