<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\Nota_Venta;

class FacturaController extends Controller
{
    public function inicio()
    {
        $facturaNotaV = Factura::with('nota_venta')->get();
        return (view('facturas.inicio', compact('facturaNotaV')));

    
    }

    public function editar($id)
    {
        $nota = Nota_Venta::where('id', '=', $id)->first();
        $factura = Factura::where('ID_Nota_Venta', '=', $id)->with('nota_venta')->first();
        return view('facturas.editar', compact('factura','nota'));
    }


    public function eliminar($id)
    {
        $nota = Nota_Venta::where('id', '=', $id)->first();
        $nota->delete();
     
        
        return redirect(route('facturas.inicio'))->with('eliminado', 'Factura eliminada exitosamente');
    }

    
    public function actualizar(Request $request, $id)
    {

        $request->validate([
            'montoTotal' => 'required',
            'fecha' => 'required',
            'nroFactura' => 'required',
           
      
        ], [
            'montoTotal.required' => 'Debes ingresar el monto total de la factura.',
            'fecha.required' => 'Debes ingresar una fecha.',        
            'nroFactura.required' => 'Debes ingresar un numero de factura.',  
        ]);

        $nota = Nota_Venta::where('id', '=', $id)->first();  /* User::findOrFail($id) esto es para regresar un valor null en un error de base de datos */

        $nota->update([
            'montoTotal' => $request->montoTotal,
            'fecha' => $request->fecha,
        
        ]);


        $nota->save();
       

        $factura = Factura::where('ID_Nota_Venta', '=', $nota->id)->first();

        $factura->update([
            'nroFactura' => $request->nroFactura,
            'nit' => $request->nit,
        ]);

        $factura->save();

        return redirect()->route('facturas.inicio')->with('actualizado', 'Factura actualizada exitosamente');
    }

}
