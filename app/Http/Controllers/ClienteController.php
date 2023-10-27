<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cliente;

class ClienteController extends Controller
{
    //
    public function inicio()
    {
        $clientesUsuarios = Cliente::with('usuario')->get();
        return (view('usuariosv2.clientes.inicio', compact('clientesUsuarios')));
    }

    public function crear()
    {
        return view('usuariosv2.clientes.crear');
    }

    public function editar($id)
    {
        $cliente = Cliente::where('ID_Usuario', '=', $id)->with('usuario')->first();
        return view('usuariosv2.clientes.editar', compact('cliente'));
    }

    public function eliminar($id)
    {
        $usuario = User::where('id', '=', $id)->first();
        $nombre = $usuario->nombre;
        $usuario->delete();
        return redirect(route('clientes2.inicio'))->with('eliminado', 'Usuario ' . $nombre . 'eliminado exitosamente');
    }

    public function guardar(REQUEST $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'telefono' => 'required',
            'ci' => 'required',
            //'cliente' => 'required',
            //'empleado' => 'required',
            'direccion' => 'required',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'ci' => $request->ci,
            'cliente' => true,
            'empleado' => false,
            'rol' => 'empleado',
            'direccion' => $request->direccion,
            'password' => bcrypt($request->password),
        ]); 

        $cliente = new Cliente();
        $user->cliente()->save($cliente);

        return redirect(route('clientes2.inicio'))->with('creado', 'Cliente registrado exitosamente');
    }

    public function actualizar(REQUEST $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'ci' => 'required',
            'direccion' => 'required',
        ]);

        $usuario = User::where('id', '=', $id)->first();  

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

        $usuario->save();

        return redirect(route('clientes2.inicio'))->with('actualizado', 'Usuario actualizado exitosamente');
    }
}
