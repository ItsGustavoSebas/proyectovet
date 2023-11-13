<?php

namespace App\Http\Controllers;

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
            'edad' => 'required',
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
        }
        if ($request->has('ID_Raza') && $request->input('ID_Raza') !== 'nueva') {
            $idRaza = $request->input('ID_Raza');
        } else {
            $raza = new Raza();
            $raza->nombre = $request->input('nuevaRaza');
            $raza->descripcion = $request->input('descripcionRaza');
            $raza->save();
            $idRaza = $raza->id;
        }
        $historial = new Historial();
        $historial->peso = $request->peso;
        $historial->altura = $request->altura;
        $historial->observacion = $request->observacion;
        $historial->save();
        $mascota = new Mascota();
        $mascota->nombre = $request->nombre;
        $mascota->sexo = $request->sexo;
        $mascota->color = $request->color;
        $mascota->fechaNacimiento = $request->fechaNacimiento;
        $mascota->edad = $request->edad;
        $mascota->esterilizado = $esterilizado;
        $mascota->ID_Cliente = $request->ID_Cliente;
        $mascota->ID_Especie = $idEspecie;
        $mascota->ID_Raza = $idRaza;
        $mascota->ID_Historial = $historial->id;
        $mascota->save();

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
            'edad' => 'required',
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
        }
        if ($request->has('ID_Raza') && $request->input('ID_Raza') !== 'nueva') {
            $idRaza = $request->input('ID_Raza');
        } else {
            $raza = new Raza();
            $raza->nombre = $request->input('nuevaRaza');
            $raza->descripcion = $request->input('descripcionRaza');
            $raza->save();
            $idRaza = $raza->id;
        }
        $historial = Historial::where('id', '=', $mascota->ID_Historial)->first();
        $historial->peso = $request->peso;
        $historial->altura = $request->altura;
        $historial->observacion = $request->observacion;
        $historial->save();
        $mascota->nombre = $request->nombre;
        $mascota->sexo = $request->sexo;
        $mascota->color = $request->color;
        $mascota->fechaNacimiento = $request->fechaNacimiento;
        $mascota->edad = $request->edad;
        $mascota->esterilizado = $esterilizado;
        $mascota->ID_Cliente = $request->ID_Cliente;
        $mascota->ID_Especie = $idEspecie;
        $mascota->ID_Raza = $idRaza;
        $mascota->save();
        
        return redirect(route('mascotas.inicio', $request->ID_Cliente))->with('actualizado', 'Mascota actualizada exitosamente');
    }

    public function eliminar($id)
    {
        $mascota = Mascota::where('id', '=', $id)->first();
        $nombre = $mascota->nombre;
        $ID_Cliente = $mascota->ID_Cliente;
        $mascota->delete();
        return redirect(route('mascotas.inicio', $ID_Cliente))->with('eliminado', 'Mascota ' . $nombre . ' eliminada exitosamente');
    }
}
