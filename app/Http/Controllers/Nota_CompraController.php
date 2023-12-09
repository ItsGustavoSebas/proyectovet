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
        return (view('4_Ventas_Y_Finanzas.Nota_Compra.inicio', compact('nota_compras', 'lotes')));
    }

    public function crear()
    {
        $productos = Producto::all();
        $proveedores = Proveedor::all();
        $lotes = Lote::all();
        return view('4_Ventas_Y_Finanzas.Nota_Compra.crear', compact('productos', 'proveedores', 'lotes'));
    }

    public function eliminar($id)
    {
        $notaCompra = Nota_Compra::find($id);

        if ($notaCompra) {
            // Obtener los IDs de lotes asociados
            $lotesIds = $notaCompra->lotes->pluck('id')->toArray();

            // Actualizar los lotes asociados cambiando el atributo a null
            Lote::whereIn('id', $lotesIds)->update(['ID_NotaCompra' => null]);

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
            'lotes' => 'required|array',
        ]);

        // Crear la nota de compra
        $notaCompra = new Nota_Compra();
        $notaCompra->montoTotal = $request->monto_total;
        $notaCompra->save();

        // Actualizar los lotes seleccionados
        Lote::whereIn('id', $request->lotes)->update(['ID_NotaCompra' => $notaCompra->id]);

        // Crear DetalleBitacora
        $this->crearBitacora('Crear Nota de Compra', $request->method(), $notaCompra->id);

        return redirect(route('nota_compra.inicio'))->with('creado', 'Nota de Compra añadida exitosamente');
    }

    private function crearBitacora($accion, $metodo, $registroId)
    {
        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);
            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => $accion,
                'metodo' => $metodo,
                'hora' => $horaActual,
                'tabla' => 'nota_compra',
                'registroId' => $registroId,
                'ruta' => request()->fullurl(),
            ]);
        }
    }

    public function obtenerLotesPorProveedor($proveedorId)
    {
        $lotes = Lote::where('ID_Proveedor', $proveedorId)
                    ->whereNull('ID_NotaCompra')
                    ->get();

        return response()->json($lotes);
    }

    public function obtenerPrecioCompra($loteId)
    {
        try {
            $totalPrecioCompra = LoteProd::where('ID_Lote', $loteId)->sum('precioCompra');
            return response()->json($totalPrecioCompra);
        } catch (\Exception $e) {
            // Manejar cualquier excepción aquí
            return response()->json(['error' => 'Error al obtener el precio de compra'], 500);
        }
    }



    public function generarCompraPDF($id) {
        // Obtén la información de la compra
        $NotaCompra = Nota_Compra::findOrFail($id);
    
        // Encuentra los lotes asociados a la compra
        $lotes = Lote::where('ID_NotaCompra', $id)->get();
    
        // Inicializa un arreglo para almacenar los productos de los lotes
        $lotesprod = [];
    
        // Itera sobre los lotes para obtener los productos asociados a cada uno
        foreach ($lotes as $lote) {
            $productosDelLote = LoteProd::where('ID_Lote', $lote->id)->get();
            $lotesprod[$lote->id] = $productosDelLote;
        }
    
        // Pasar datos a la vista
        $data = [
            'NotaCompra' => $NotaCompra,
            'lotes' => $lotes,
            'lotesprod' => $lotesprod,
        ];
    
        // Cargar vista y generar PDF
        $pdf = Pdf::loadView('PDF.notaCompra', $data);
    
        return $pdf->stream('notaCompra.pdf');
    }

}
