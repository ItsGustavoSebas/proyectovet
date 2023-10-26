<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use App\Models\Mascota;
use App\Models\TratamientoDeLaConsulta;
use Illuminate\Http\Request;

class HistorialController extends Controller
{
    public function inicio($id)
    {
        $mascota = Mascota::where('id', '=', $id)->first();
        $historial = Historial::where('id', '=', $mascota->ID_Historial)->first();
        $tratamientos = TratamientoDeLaConsulta::where('ID_Historial', '=', $mascota->ID_Historial)->get();
        return view('historial.inicio', compact('historial', 'tratamientos', 'mascota'));
    }
}
