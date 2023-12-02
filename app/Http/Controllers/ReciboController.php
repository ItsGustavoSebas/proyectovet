<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recibo;
use App\Models\Nota_Venta;
use App\Models\DetalleVenta;
use App\Models\Cliente;
use App\Models\Detalle_Venta;
use App\Models\Empleado;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class ReciboController extends Controller
{
    public function inicio()
    {
        $ReciboNotaV = Recibo::with('nota_venta')->get();
        return (view('4_Ventas_Y_Finanzas.Recibo.inicio', compact('ReciboNotaV')));

    
    }

    public function editar($id)
    {
        $nota = Nota_Venta::where('id', '=', $id)->first();
        $Recibo = Recibo::where('ID_Nota_Venta', '=', $id)->with('nota_venta')->first();
        return view('4_Ventas_Y_Finanzas.Recibo.editar', compact('Recibo','nota'));
    }


    public function eliminar($id)
    {
        $nota = Nota_Venta::where('id', '=', $id)->first();
        $nota->delete();
        return redirect(route('Recibos.inicio'))->with('Eliminado', 'Recibo eliminado exitosamente');
    }

    
    public function actualizar(Request $request, $id)
    {

        $request->validate([
            'montoTotal' => 'required',
            'fecha' => 'required',
            'nroRecibo' => 'required'
           
      
        ], [
            'montoTotal.required' => 'Debes ingresar el monto total del Recibo.',
            'fecha.required' => 'Debes ingresar la fecha.',        
            'nroRecibo.required' => 'Debes ingresar el número de Recibo.' 
        ]);

        $nota = Nota_Venta::where('id', '=', $id)->first();  /* User::findOrFail($id) esto es para regresar un valor null en un error de base de datos */

        $nota->update([
            'montoTotal' => $request->montoTotal,
            'fecha' => $request->fecha
        
        ]);


        $nota->save();
       

        $Recibo = Recibo::where('ID_Nota_Venta', '=', $nota->id)->first();

        $Recibo->update([
            'nroRecibo' => $request->nroRecibo
        ]);

        $Recibo->save();

        return redirect()->route('Recibos.inicio')->with('Actualizado', 'Recibo actualizado exitosamente');
    }

    public function generarReciboPDF($id){
        $Recibo = Recibo::where('ID_Nota_Venta', '=', $id)->first();
        $NotaVenta = Nota_Venta::where('id', '=', $id)->first();
        $cl = Cliente::where('ID_Usuario', '=', $NotaVenta->ID_Cliente)->first();
        $cliente = User::where('id', '=', $cl->ID_Usuario)->first();
        $em = Empleado::where('ID_Usuario', '=', $NotaVenta->ID_Empleado)->first();
        $empleado = User::where('id', '=', $em->ID_Usuario)->first();
        $DetallesVenta=Detalle_Venta::where('ID_Nota_Venta', '=', $id)->get();
        $data = [
            'Recibo' => $Recibo,
            'NotaVenta'=>$NotaVenta,
            'DetallesVentas'=>$DetallesVenta,
            'cliente'=>$cliente,
            'empleado' => $empleado
        ];

        $pdf = Pdf::loadView('PDF.recibo', $data);


        return $pdf->stream('Recibo.pdf');
    }

}
