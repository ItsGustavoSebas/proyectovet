<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
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

        //Eliminar Usuario

        $usuario = User::where('id', '=', $id)->first();
        $nombre = $usuario->nombre;
        $usuario->delete();

        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Eliminar Cliente',
                'metodo' => request()->method(),
                'hora' => $horaActual,
                'tabla' => 'clientes-users',
                'registroId' => $id,
                'ruta'=> request()->fullurl(),
            ]);
        }

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

        //Crear Usuario

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
        ])->assignRole('Cliente');

        //Crear cliente

        $cliente = new Cliente();

        //Asociar Usuario-Cliente

        $user->cliente()->save($cliente);

        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Crear Cliente',
                'metodo' => $request->method(),
                'hora' => $horaActual,
                'tabla' => 'clientes-users',
                'registroId' => $user->id,
                'ruta'=> request()->fullurl(),
            ]);
        }

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

        //Actualizar Usuario

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

        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Editar Cliente',
                'metodo' => $request->method(),
                'hora' => $horaActual,
                'tabla' => 'clientes-users',
                'registroId' => $usuario->id,
                'ruta'=> request()->fullurl(),
            ]);
        }

        return redirect(route('clientes2.inicio'))->with('actualizado', 'Usuario actualizado exitosamente');
    }
}
