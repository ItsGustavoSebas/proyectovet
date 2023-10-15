<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function inicio()
    {
        $usuarios = User::all();
        return (view('usuarios.inicio', compact('usuarios')));
    }

    public function crear()
    {
        return view('usuarios.crear');
    }

    public function guardar(REQUEST $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'telefono' => 'required',
            'ci' => 'required',
            'password' => 'required'
        ]);
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->telefono = $request->telefono;
        $usuario->ci = $request->ci;
        $usuario->direccion = $request->direccion;
        $usuario->password = bcrypt($request->password);
        $usuario->save();

        return redirect(route('usuarios.inicio'))->with('creado', 'Usuario creado exitosamente');
    }

    public function editar($id)
    {
        $usuario = User::where('id', '=', $id)->first();
        return view('usuarios.editar', compact('usuario'));
    }

    public function actualizar(REQUEST $request, $id)
    {
        $usuario = User::where('id', '=', $id)->first();
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'ci' => 'required',
        ]);
        if (trim($request->password == '')) {
            $usuario->name = $request->name;
            $usuario->email = $request->email;
            $usuario->telefono = $request->telefono;
            $usuario->ci = $request->ci;
            $usuario->direccion = $request->direccion;
        } else {
            $usuario->name = $request->name;
            $usuario->email = $request->email;
            $usuario->telefono = $request->telefono;
            $usuario->ci = $request->ci;
            $usuario->direccion = $request->direccion;
            $usuario->password = bcrypt($request->password);
        }
        $usuario->save();
        return redirect(route('usuarios.inicio'))->with('actualizado', 'Usuario actualizado exitosamente');
    }

    public function eliminar($id)
    {
        $usuario = User::where('id', '=', $id)->first();
        $nombre = $usuario->nombre;
        $usuario->delete();
        return redirect(route('usuarios.inicio'))->with('eliminado', 'Usuario ' . $nombre . 'eliminado exitosamente');
    }
}
