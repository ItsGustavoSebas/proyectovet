<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\DetalleBitacora;
use Illuminate\Http\Request;

class DetalleBitacoraController extends Controller
{
    public function inicio($id)
    {
        $bitacora = Bitacora::where('id', '=', $id)->first();
        $detbitacoras = DetalleBitacora::where('ID_Bitacora', '=', $id)->get();
        return view('detallebitacoras.inicio', compact('detbitacoras', 'bitacora'));
    }
}
