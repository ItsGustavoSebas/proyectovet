<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\DetalleBitacora;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DetalleBitacoraController extends Controller
{
    public function inicio($id)
    {
        $bitacora = Bitacora::where('id', '=', $id)->first();
        $detbitacoras = DetalleBitacora::where('ID_Bitacora', '=', $id)->get();
        return view('detallebitacoras.inicio', compact('detbitacoras', 'bitacora'));
    }

    public function generarDetalleBitacoraPDF($id){
        $bitacora = Bitacora::where('id', '=', $id)->first();
        $detbitacoras = DetalleBitacora::where('ID_Bitacora', '=', $id)->get();
        $data = [
            'bitacora' => $bitacora,
            'detbitacoras' => $detbitacoras,
        ];

        $pdf = Pdf::loadView('PDF.detallebitacora', $data);

        return $pdf->stream('Bitacoras-Clientes.pdf');
    }
}
