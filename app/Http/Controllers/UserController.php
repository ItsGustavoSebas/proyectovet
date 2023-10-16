<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function rinicio()
    {
        $usuarios = User::all();
        return (view('usuarios.iniciov2', compact('usuarios')));
    }

    public function rcrear()
    {
        return view('usuarios.crearv2');
    }

    public function rguardar(REQUEST $request)
    {

        // Realizar validaciones
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'telefono' => 'required',
            'ci' => 'required',
            'password' => 'required',
            'profile_photo_url' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        // Almacena la imagen en el sistema de archivos
        $nombreImagen = time() . '_' . $request->profile_photo_url->getClientOriginalName();
        $ruta = $request->profile_photo_url->storeAs('public/imagenes/empleados', $nombreImagen);
        $url = Storage::url($ruta);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'ci' => $request->ci,
            'direccion' => $request->direccion,
            'password' => bcrypt($request->password),
            'profile_photo_path' => $url
        ]);
        return redirect(route('usuarios.rinicio'))->with('creado', 'Usuario creado exitosamente');
    }

    public function reliminar($id)
    {
        $usuario = User::where('id', '=', $id)->first();
        $nombre = $usuario->nombre;
        $usuario->delete();
        return redirect(route('usuarios.rinicio'))->with('eliminado', 'Usuario ' . $nombre . 'eliminado exitosamente');
    }

    public function reditar($id)
    {
        $usuario = User::where('id', '=', $id)->first();
        return view('usuarios.editarv2', compact('usuario'));
    }

    public function ractualizar(Request $request, $id)
    {
        $usuario = User::where('id', '=', $id)->first();  /* User::findOrFail($id) esto es para regresar un valor null en un error de base de datos */

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'ci' => 'required',
        ]);
        $usuario->update([
            'name' => $request->name,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'ci' => $request->ci,
            'direccion' => $request->direccion,
        ]);

        if ($request->password) {
            $usuario->update([
                'password' => bcrypt($request->password),
            ]);
        }

        if ($request->hasFile('profile_photo_url')) {
            $nombreImagen = time() . '_' . $request->profile_photo_url->getClientOriginalName();
            $ruta = $request->profile_photo_url->storeAs('public/imagenes/empleados', $nombreImagen);
            $url = Storage::url($ruta);
            $usuario->update([
                'profile_photo_path' => $url,
            ]);
        }

        $usuario->save();

        return redirect()->route('usuarios.rinicio')->with('actualizado', 'Usuario actualizado exitosamente');
    }

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
