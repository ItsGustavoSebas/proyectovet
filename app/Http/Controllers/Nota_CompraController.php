<?php

namespace App\Http\Controllers;


use App\Models\Bitacora;
use App\Models\Lote;
use App\Models\LoteProd;
use App\Models\Proveedor;
use App\Models\Producto;
use App\Models\Nota_Compra;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Nota_CompraController extends Controller
{
    public function inicio()
    {
        $nota_compras = Nota_Compra::all();
        $lotes = Lote::all();
        return (view('4_Ventas_Y_Finanzas.nota_compra.inicio', compact('nota_compras', 'lotes')));
    }

    public function crear()
    {
        $productos = Producto::all();
        $proveedores = Proveedor::all();
        $lotes = Lote::all();
        return view('4_Ventas_Y_Finanzas.nota_compra.crear', compact('productos', 'proveedores', 'lotes'));
    }

    public function eliminar($id)
    {
        $notaCompra = Nota_Compra::find($id);

        if ($notaCompra) {
            // Eliminar lotes asociados
            $notaCompra->lotes()->delete();
            // Eliminar la nota de compra
            $notaCompra->delete();
        }

        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Eliminar Nota de Compra',
                'metodo' => request()->method(),
                'hora' => $horaActual,
                'tabla' => 'nota_compra',
                'registroId' => $id,
                'ruta' => request()->fullurl(),
            ]);
        }

        return redirect(route('nota_compra.inicio'))->with('eliminado', 'Nota de compra eliminada exitosamente');
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'monto_total' => 'required',
        ]);

        $notaCompra = new Nota_Compra();
        $notaCompra->montoTotal = $request->monto_total;
        $notaCompra->save();

        $lote = Lote::find($request->lotes);
        $lote->ID_NotaCompra = $notaCompra->id;
        $lote->save();

        // Crear DetalleBitacora
        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);
            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Crear Nota de Compra',
                'metodo' => $request->method(),
                'hora' => $horaActual,
                'tabla' => 'nota_compra',
                'registroId' => $notaCompra->id,
                'ruta' => request()->fullurl(),
            ]);
        }

        return redirect(route('nota_compra.inicio'))->with('creado', 'Nota de Compra añadida exitosamente');
    }


    public function mostrarDetalles($id)
    {
        $notaCompra = Nota_Compra::findOrFail($id); // Obtener la nota de compra por su ID
        $lote = Lote::where('ID_NotaCompra', $id)->firstOrFail();
    
        // Obtén los productos asociados al lote
        $lotesprod = LoteProd::where('ID_Lote', $lote->id)->get();

        return view('4_Ventas_Y_Finanzas.Nota_Compra.detalles', ['nota_compra' => $notaCompra]);
    }

    public function obtenerLotesPorProveedor($proveedorId)
    {
        $lotes = Lote::where('ID_Proveedor', $proveedorId)->get();

        return response()->json($lotes);
    }

    public function obtenerPrecioCompra($loteprod)
    {
        $preciosCompra = LoteProd::where('ID_Lote', $loteprod)->pluck('precioCompra');
        return response()->json($preciosCompra);
    }

    public function generarCompraPDF($id) {
        // Obtén la información de la compra
        $NotaCompra = Nota_Compra::findOrFail($id);
    
        // Encuentra el lote asociado a la compra
        $lote = Lote::where('ID_NotaCompra', $id)->firstOrFail();
    
        // Obtén los productos asociados al lote
        $lotesprod = LoteProd::where('ID_Lote', $lote->id)->get();
    
        // Pasar datos a la vista
        $data = [
            'NotaCompra' => $NotaCompra,
            'lote' => $lote,
            'lotesprod' => $lotesprod,
        ];
    
        // Cargar vista y generar PDF
        $pdf = Pdf::loadView('PDF.notaCompra', $data);
    
        return $pdf->stream('notaCompra.pdf');
    }

}
