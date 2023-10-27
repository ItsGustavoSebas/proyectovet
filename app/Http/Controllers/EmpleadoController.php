<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Empleado;

class EmpleadoController extends Controller
{
    //

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
        $empleado = Empleado::where('ID_Usuario', '=', $id)->with('usuario')->first();
        return view('usuariosv2.empleados.editar', compact('empleado'));
    }

    public function eliminar($id)
    {
        $usuario = User::where('id', '=', $id)->first();
        $nombre = $usuario->nombre;
        $usuario->delete();
        return redirect(route('usuarios.rinicio'))->with('eliminado', 'Usuario ' . $nombre . 'eliminado exitosamente');
    }

    public function guardar(REQUEST $request)
    {

        // Realizar validaciones

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'telefono' => 'required',
            'ci' => 'required',
            // 'cliente' => 'required',
            // 'empleado' => 'required',
            'direccion' => 'required',
            'password' => 'required',
            'ruta_imagen_e' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'salario' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'ci' => $request->ci,
            'cliente' => false,
            'empleado' => true,
            'rol' => 'empleado',
            'direccion' => $request->direccion,
            'password' => bcrypt($request->password),
        ]);  

            $nombreImagen = time() . '_' . $request->ruta_imagen_e->getClientOriginalName();
            $ruta = $request->ruta_imagen_e->storeAs('public/imagenes/empleados', $nombreImagen);
            $url = Storage::url($ruta);

        $empleado = new Empleado([
            'salario' => $request->salario,
            'ruta_imagen_e' => $url,
        ]);

        $user->empleado()->save($empleado);
        

        // $cliente = new Cliente();
        // $user->cliente()->save($cliente);

        return redirect(route('empleados.inicio'))->with('creado', 'Empleado registrado exitosamente');
    }

    public function actualizar(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'ci' => 'required',
            'direccion' => 'required',
            'salario' => 'required',
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

        return redirect()->route('empleados.inicio')->with('actualizado', 'Usuario actualizado exitosamente');
    }
}
