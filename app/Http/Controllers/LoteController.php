<?php

namespace App\Http\Controllers;

use App\Models\Lote;
use App\Models\LoteProd;
use App\Models\Medida;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class LoteController extends Controller
{
    public function inicio()
    {
        $lotes = Lote::all();
        return (view('lotes.inicio', compact('lotes')));
    }

    public function crear()
    {
        $productos = Producto::all();
        $medidas = Medida::all();
        $proveedores = Proveedor::all();
        return view('lotes.crear', compact('productos', 'medidas', 'proveedores'));
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'numeroLote' => 'required',
            'fechaCompra' => 'required',
            'productos' => 'required|array',
        ]);

        $lote = new Lote();
        $lote->numeroLote = $request->numeroLote;
        $lote->fechaCompra = $request->fechaCompra;
        $lote->fechaVencimiento = $request->fechaVencimiento;
        $lote->ID_Proveedor = $request->proveedor_id;
        $lote->save();

        foreach ($request->productos as $productoData) {
            $producto_id = $productoData['producto_id'];
            $cantidad = $productoData['cantidad'];
            $medida_id = $productoData['medida_id'];
            $precioCompra = $productoData['precioCompra'];

            $loteprod = new LoteProd();
            $loteprod->ID_Lote = $lote->id;
            $loteprod->ID_Producto = $producto_id;
            $loteprod->cantidadComprada = $cantidad;
            $loteprod->cantidadActual = $cantidad;
            $loteprod->ID_Medida = $medida_id;
            $loteprod->precioCompra = $precioCompra;
            $loteprod->save();
        }

        return redirect(route('lotes.inicio'))->with('creado', 'Lote añadido exitosamente');
    }

    public function editar($id)
    {
        $lote = Lote::find($id);
        $productos = Producto::all();
        $medidas = Medida::all();
        $proveedores = Proveedor::all();
        return view('lotes.editar', compact('lote', 'productos', 'medidas', 'proveedores'));
    }

    public function actualizar(Request $request, $id)
    {
        $lote = Lote::find($id);

        $request->validate([
            'numeroLote' => 'required',
            'fechaCompra' => 'required',
            'productos' => 'required|array',
        ]);

        $lote->numeroLote = $request->numeroLote;
        $lote->fechaCompra = $request->fechaCompra;
        $lote->fechaVencimiento = $request->fechaVencimiento;
        $lote->ID_Proveedor = $request->proveedor_id;
        $lote->save();

        LoteProd::where('ID_Lote', $lote->id)->delete();

        foreach ($request->productos as $productoData) {
            $producto_id = $productoData['producto_id'];
            $cantidad = $productoData['cantidad'];
            $medida_id = $productoData['medida_id'];
            $precioCompra = $productoData['precioCompra'];

            $loteprod = new LoteProd();
            $loteprod->ID_Lote = $lote->id;
            $loteprod->ID_Producto = $producto_id;
            $loteprod->cantidadComprada = $cantidad;
            $loteprod->cantidadActual = $cantidad;
            $loteprod->ID_Medida = $medida_id;
            $loteprod->precioCompra = $precioCompra;
            $loteprod->save();
        }

        return redirect(route('lotes.inicio'))->with('actualizado', 'Lote actualizado exitosamente');
    }

    public function eliminar($id)
    {
        $lote = Lote::find($id);
        $numeroLote = $lote->numeroLote;
        $lote->delete();
        return redirect(route('lotes.inicio'))->with('eliminado', 'Lote ' . $numeroLote . ' eliminado exitosamente');
    }
}
