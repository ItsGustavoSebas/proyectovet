<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Especie;
use App\Models\Historial;
use App\Models\Raza;
use App\Models\Mascota;
use App\Models\User;
use Illuminate\Http\Request;

class MascotaController extends Controller
{
    public function inicio($id)
    {
        $usuario = User::where('id', '=', $id)->first();
        $mascotas = Mascota::where('ID_Cliente', '=', $id)->get();
        return view('mascotas.inicio', compact('mascotas', 'usuario'));
    }

    public function rinicio()
    {
        $mascotas = Mascota::all();
        return view('mascotas.rinicio', compact('mascotas'));
    }

    public function crear($id)
    {
        $usuario = $id;
        $especies = Especie::all();
        $razas = Raza::all();
        return view('mascotas.crear', compact('usuario', 'especies', 'razas'));
    }


    public function guardar(REQUEST $request)
    {
        $request->validate([
            'nombre' => 'required',
            'sexo' => 'required',
            'color' => 'required',
            'fechaNacimiento' => 'required',
            'peso' => 'required',
            'altura' => 'required',
            'observacion' => 'required',
        ]);
        $esterilizado = $request->has('esterilizado') ? true : false;
        if ($request->has('ID_Especie') && $request->input('ID_Especie') !== 'nueva') {
            $idEspecie = $request->input('ID_Especie');
        } else {
            $especie = new Especie();
            $especie->nombre = $request->input('nuevaEspecie');
            $especie->save();
            $idEspecie = $especie->id;

            //Crear DetalleBitacora

            $bitacora_id = session('bitacora_id');

            if ($bitacora_id) {
                $bitacora = Bitacora::find($bitacora_id);

                $horaActual = now()->format('H:i:s');

                $bitacora->detalleBitacoras()->create([
                    'accion' => 'Crear Especie',
                    'metodo' => $request->method(),
                    'hora' => $horaActual,
                    'tabla' => 'especie',
                    'registroId' => $especie->id,
                    'ruta'=> request()->fullurl(),
                ]);
            }
          
        }
        if ($request->has('ID_Raza') && $request->input('ID_Raza') !== 'nueva') {
            $idRaza = $request->input('ID_Raza');
        } else {
            $raza = new Raza();
            $raza->nombre = $request->input('nuevaRaza');
            $raza->descripcion = $request->input('descripcionRaza');
            $raza->save();
            $idRaza = $raza->id;

            //Crear DetalleBitacora

            $bitacora_id = session('bitacora_id');

            if ($bitacora_id) {
                $bitacora = Bitacora::find($bitacora_id);

                $horaActual = now()->format('H:i:s');

                $bitacora->detalleBitacoras()->create([
                    'accion' => 'Crear Raza',
                    'metodo' => $request->method(),
                    'hora' => $horaActual,
                    'tabla' => 'raza',
                    'registroId' => $raza->id,
                    'ruta'=> request()->fullurl(),
                ]);
            }

        }
        $historial = new Historial();
        $historial->peso = $request->peso;
        $historial->altura = $request->altura;
        $historial->observacion = $request->observacion;
        $historial->save();
        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Crear Historial',
                'metodo' => $request->method(),
                'hora' => $horaActual,
                'tabla' => 'historial_medico',
                'registroId' => $historial->id,
                'ruta'=> request()->fullurl(),
            ]);
        }

        $mascota = new Mascota();
        $mascota->nombre = $request->nombre;
        $mascota->sexo = $request->sexo;
        $mascota->color = $request->color;
        $mascota->fechaNacimiento = $request->fechaNacimiento;
        $mascota->esterilizado = $esterilizado;
        $mascota->ID_Cliente = $request->ID_Cliente;
        $mascota->ID_Especie = $idEspecie;
        $mascota->ID_Raza = $idRaza;
        $mascota->ID_Historial = $historial->id;
        $mascota->save();

        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Crear Mascota',
                'metodo' => $request->method(),
                'hora' => $horaActual,
                'tabla' => 'mascota',
                'registroId' => $mascota->id,
                'ruta'=> request()->fullurl(),
            ]);
        }

        return redirect(route('mascotas.inicio', $request->ID_Cliente))->with('creado', 'Mascota añadida exitosamente');
    }

    public function editar($id)
    {
        $mascota = Mascota::where('id', '=', $id)->first();
        $especies = Especie::all();
        $razas = Raza::all();
        return view('mascotas.editar', compact('mascota', 'especies', 'razas'));
    }

    public function actualizar(REQUEST $request, $id)
    {
        $mascota = Mascota::where('id', '=', $id)->first();
        $request->validate([
            'nombre' => 'required',
            'sexo' => 'required',
            'color' => 'required',
            'fechaNacimiento' => 'required',
            'peso' => 'required',
            'altura' => 'required',
            'observacion' => 'required',
        ]);
        $esterilizado = $request->has('esterilizado') ? true : false;
        if ($request->has('ID_Especie') && $request->input('ID_Especie') !== 'nueva') {
            $idEspecie = $request->input('ID_Especie');
        } else {
            $especie = new Especie();
            $especie->nombre = $request->input('nuevaEspecie');
            $especie->save();
            $idEspecie = $especie->id;

            //Crear DetalleBitacora

            $bitacora_id = session('bitacora_id');

            if ($bitacora_id) {
                $bitacora = Bitacora::find($bitacora_id);

                $horaActual = now()->format('H:i:s');

                $bitacora->detalleBitacoras()->create([
                    'accion' => 'Crear Especie',
                    'metodo' => $request->method(),
                    'hora' => $horaActual,
                    'tabla' => 'especie',
                    'registroId' => $especie->id,
                    'ruta'=> request()->fullurl(),
                ]);
            }
            
        }
        if ($request->has('ID_Raza') && $request->input('ID_Raza') !== 'nueva') {
            $idRaza = $request->input('ID_Raza');
        } else {
            $raza = new Raza();
            $raza->nombre = $request->input('nuevaRaza');
            $raza->descripcion = $request->input('descripcionRaza');
            $raza->save();
            $idRaza = $raza->id;

            //Crear DetalleBitacora

            $bitacora_id = session('bitacora_id');

            if ($bitacora_id) {
                $bitacora = Bitacora::find($bitacora_id);

                $horaActual = now()->format('H:i:s');

                $bitacora->detalleBitacoras()->create([
                    'accion' => 'Crear Raza',
                    'metodo' => $request->method(),
                    'hora' => $horaActual,
                    'tabla' => 'raza',
                    'registroId' => $raza->id,
                    'ruta'=> request()->fullurl(),
                ]);
            }
        }
        $historial = Historial::where('id', '=', $mascota->ID_Historial)->first();
        $historial->peso = $request->peso;
        $historial->altura = $request->altura;
        $historial->observacion = $request->observacion;
        $historial->save();

        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Editar Historial',
                'metodo' => $request->method(),
                'hora' => $horaActual,
                'tabla' => 'historial_medico',
                'registroId' => $historial->id,
                'ruta'=> request()->fullurl(),
            ]);
        }

        $mascota->nombre = $request->nombre;
        $mascota->sexo = $request->sexo;
        $mascota->color = $request->color;
        $mascota->fechaNacimiento = $request->fechaNacimiento;
        $mascota->esterilizado = $esterilizado;
        $mascota->ID_Cliente = $request->ID_Cliente;
        $mascota->ID_Especie = $idEspecie;
        $mascota->ID_Raza = $idRaza;
        $mascota->save();

        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Editar Mascota',
                'metodo' => $request->method(),
                'hora' => $horaActual,
                'tabla' => 'mascota',
                'registroId' => $mascota->id,
                'ruta'=> request()->fullurl(),
            ]);
        }
        
        return redirect(route('mascotas.inicio', $request->ID_Cliente))->with('actualizado', 'Mascota actualizada exitosamente');
    }

    public function eliminar($id)
    {
        $mascota = Mascota::where('id', '=', $id)->first();
        $nombre = $mascota->nombre;
        $ID_Cliente = $mascota->ID_Cliente;
        $mascota->delete();

        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Eliminar Mascota',
                'metodo' => request()->method(),
                'hora' => $horaActual,
                'tabla' => 'mascota',
                'registroId' => $id,
                'ruta'=> request()->fullurl(),
            ]);
        }

        return redirect(route('mascotas.inicio', $ID_Cliente))->with('eliminado', 'Mascota ' . $nombre . ' eliminada exitosamente');
    }
}
