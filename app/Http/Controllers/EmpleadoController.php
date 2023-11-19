<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Empleado;
use PhpParser\Node\Stmt\Else_;
use Spatie\Permission\Models\Role;

class EmpleadoController extends Controller
{

    public function inicio()
    {
        $empleadosUsuarios = Empleado::with('usuario')->get();
        return (view('usuariosv2.empleados.inicio', compact('empleadosUsuarios')));
    }

    public function crear()
    {
        return view('usuariosv2.empleados.crear');
    }

    public function editar($id)
    {
        $user = User::where('id', '=', $id)->first();
        $empleado = Empleado::where('ID_Usuario', '=', $id)->with('usuario')->first();
        return view('usuariosv2.empleados.editar', compact('empleado','user'));
    }

    public function eliminar($id)
    {
        $usuario = User::where('id', '=', $id)->first();
        $nombre = $usuario->nombre;
        $usuario->delete();

        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Eliminar Empleado',
                'metodo' => request()->method(),
                'hora' => $horaActual,
                'tabla' => 'empleados-users',
                'registroId' => $id,
                'ruta'=> request()->fullurl(),
            ]);
        }
        
        return redirect(route('empleados.inicio'))->with('eliminado', 'Usuario ' . $nombre . 'eliminado exitosamente');
    }

    public function guardar(REQUEST $request)
    {

        // Realizar validaciones

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'telefono' => 'required|unique:users,telefono',
            'ci' => 'required|unique:users,ci',
            'direccion' => 'required',
            'password' => 'required',
            'ruta_imagen_e' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'salario' => 'required',
            'roles' => 'required|array',
        ], [
            'name.required' => 'Debes ingresar el nombre.',
            'email.required' => 'Debes ingresar el correo electrónico.',
            'email.unique' => 'El correo electrónico ya está en uso.',
            'telefono.required' => 'Debes ingresar el teléfono.',
            'ci.required' => 'Debes ingresar el C.I.',
            'direccion.required' => 'Debes ingresar la dirección.',
            'ci.unique' => 'La Cédula de Identidad ya está registrada.',
            'telefono.unique' => 'El número de teléfono ya está en uso.',
            'salario.required' => 'Debes ingresar el salario.',
            'roles.required' => 'Debes ingresar al menos un rol',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'ci' => $request->ci,
            'cliente' => false,
            'empleado' => true,
            'direccion' => $request->direccion,
            'password' => bcrypt($request->password),
        ])->syncRoles($request->roles);

        if ($request->ruta_imagen_e) {
            $nombreImagen = time() . '_' . $request->ruta_imagen_e->getClientOriginalName();
            $ruta = $request->ruta_imagen_e->storeAs('public/imagenes/empleados', $nombreImagen);
            $url = Storage::url($ruta);
        }else{
            $url = null;
        }

        $empleado = new Empleado([
            'salario' => $request->salario,
            'ruta_imagen_e' => $url,
        ]);

        $user->empleado()->save($empleado);

        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Crear Empleado',
                'metodo' => $request->method(),
                'hora' => $horaActual,
                'tabla' => 'empleados-users',
                'registroId' => $user->id,
                'ruta'=> request()->fullurl(),
            ]);
        }


        return redirect(route('empleados.inicio'))->with('creado', 'Empleado registrado exitosamente');
    }

    public function actualizar(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id,
            'telefono' => 'required|unique:users,telefono,' . $id,
            'ci' => 'required|unique:users,ci,' . $id,
            'direccion' => 'required',
            'salario' => 'required',
            'roles' => 'required|array',
        ], [
            'name.required' => 'Debes ingresar el nombre.',
            'email.required' => 'Debes ingresar el correo electrónico.',
            'email.unique' => 'El correo electrónico ya está en uso.',
            'telefono.required' => 'Debes ingresar el teléfono.',
            'ci.required' => 'Debes ingresar el C.I.',
            'direccion.required' => 'Debes ingresar la dirección.',
            'ci.unique' => 'La Cédula de Identidad ya está registrada.',
            'telefono.unique' => 'El número de teléfono ya está en uso.',
            'salario.required' => 'Debes ingresar el salario.',
            'roles.required' => 'Debes ingresar al menos un rol',
        ]);

        $usuario = User::where('id', '=', $id)->first();  /* User::findOrFail($id) esto es para regresar un valor null en un error de base de datos */

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
        $roleNames = Role::whereIn('id', $request->roles)->pluck('name')->toArray();
        $usuario->syncRoles($roleNames);

        $empleado = empleado::where('ID_Usuario', '=', $usuario->id)->first();

        if ($request->hasFile('ruta_imagen_e')) {
            $nombreImagen = time() . '_' . $request->ruta_imagen_e->getClientOriginalName();
            $ruta = $request->ruta_imagen_e->storeAs('public/imagenes/empleados', $nombreImagen);
            $url = Storage::url($ruta);
            $empleado->update([
                'ruta_imagen_e' => $url,
            ]);
        }

        $empleado->update([
            'salario' => $request->salario,
        ]);

        $empleado->save();

        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Editar Empleado',
                'metodo' => $request->method(),
                'hora' => $horaActual,
                'tabla' => 'empleados-users',
                'registroId' => $usuario->id,
                'ruta'=> request()->fullurl(),
            ]);
        }


        return redirect()->route('empleados.inicio')->with('actualizado', 'Usuario actualizado exitosamente');
    }
}
