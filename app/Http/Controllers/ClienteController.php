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

    public function guardar(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|unique:users,email',
        'telefono' => 'required|unique:users,telefono',
        'ci' => 'required|unique:users,ci',
        'direccion' => 'required',
        'password' => 'required',
    ], [
        'name.required' => 'Debes ingresar el nombre.',
        'email.required' => 'Debes ingresar el correo electrónico.',
        'email.unique' => 'El correo electrónico ya está en uso.',
        'ci.unique' => 'La Cédula de Identidad ya está registrada.',
        'telefono.unique' => 'El número de teléfono ya está en uso.',
        'telefono.required' => 'Debes ingresar el teléfono.',
        'ci.required' => 'Debes ingresar el C.I.',
        'direccion.required' => 'Debes ingresar la dirección.',
        'password.required' => 'Debes ingresar la contraseña.',
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

public function actualizar(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|unique:users,email,' . $id,
        'telefono' => 'required|unique:users,telefono,' . $id,
        'ci' => 'required|unique:users,ci,' . $id,
        'direccion' => 'required',
    ], [
        'name.required' => 'Debes ingresar el nombre.',
        'email.required' => 'Debes ingresar el correo electrónico.',
        'email.unique' => 'El correo electrónico ya está en uso.',
        'telefono.required' => 'Debes ingresar el teléfono.',
        'ci.required' => 'Debes ingresar el C.I.',
        'direccion.required' => 'Debes ingresar la dirección.',
        'ci.unique' => 'La Cédula de Identidad ya está registrada.',
        'telefono.unique' => 'El número de teléfono ya está en uso.',
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
