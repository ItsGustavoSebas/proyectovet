<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\Nota_Venta;
use App\Models\DetalleVenta;
use App\Models\Cliente;
use App\Models\Detalle_Venta;
use App\Models\Empleado;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

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


    public function generarFacturaPDF($id){
        $factura = Factura::where('ID_Nota_Venta', '=', $id)->first();
        $NotaVenta = Nota_Venta::where('id', '=', $id)->first();
        
        $cl = Cliente::where('ID_Usuario', '=', $NotaVenta->ID_Cliente)->first();
        $cliente = User::where('id', '=', $cl->ID_Usuario)->first();
        $em = Empleado::where('ID_Usuario', '=', $NotaVenta->ID_Empleado)->first();
        $empleado = User::where('id', '=', $em->ID_Usuario)->first();
        $DetallesVenta=Detalle_Venta::where('ID_Nota_Venta', '=', $id)->get();
        $data = [
            'Factura' => $factura,
            'NotaVenta'=>$NotaVenta,
            'DetallesVentas'=>$DetallesVenta,
            'cliente'=>$cliente,
            'empleado' => $empleado
        ];

        $pdf = Pdf::loadView('PDF.factura', $data);


        return $pdf->stream('Factura.pdf');
    }


 

    public function sendEmailInicio($id)
    {
        $nota = Nota_Venta::where('id', '=', $id)->first();
        $factura = Factura::where('ID_Nota_Venta', '=', $id)->with('nota_venta')->first();
        $cl = Cliente::where('ID_Usuario', '=', $nota->ID_Cliente)->first();
        $cliente = User::where('id', '=', $cl->ID_Usuario)->first();

        $DetallesVenta=Detalle_Venta::where('ID_Nota_Venta', '=', $id)->get();
        $em = Empleado::where('ID_Usuario', '=', $nota->ID_Empleado)->first();
        $empleado = User::where('id', '=', $em->ID_Usuario)->first();
        

        return view('facturas.sendEmail', compact('factura','nota', 'cliente', 'DetallesVenta','empleado'));



    }

}
