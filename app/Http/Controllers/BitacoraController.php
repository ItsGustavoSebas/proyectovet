<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\User;
use Illuminate\Http\Request;

class BitacoraController extends Controller
{
    public function inicio($id)
    {
        $usuario = User::where('id', '=', $id)->first();
        $bitacoras = Bitacora::where('ID_Usuario', '=', $id)->get();
        return view('bitacoras.inicio', compact('bitacoras', 'usuario'));
    }

    public function rinicio()
    {
        $bitacoras = Bitacora::all();
        return view('bitacoras.rinicio', compact('bitacoras'));
    }
}
