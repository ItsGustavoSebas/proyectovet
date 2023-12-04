<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
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
        return (view('3_Inventario_Y_Productos.lotes.inicio', compact('lotes')));
    }

    public function crear()
    {
        $productos = Producto::all();
        $medidas = Medida::all();
        $proveedores = Proveedor::all();
        return view('3_Inventario_Y_Productos.lotes.crear', compact('productos', 'medidas', 'proveedores'));
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'numeroLote' => 'required',
            'fechaCompra' => 'required',
            'productos.*.producto_id' => 'required',
            'productos.*.cantidad' => 'required',
            'productos.*.medida_id' => 'required',
            'productos.*.precioCompra' => 'required',
        ]);

        $lote = new Lote();
        $lote->numeroLote = $request->numeroLote;
        $lote->fechaCompra = $request->fechaCompra;
        $lote->fechaVencimiento = $request->fechaVencimiento;
        $lote->estado = true;
        $lote->ID_Proveedor = $request->proveedor_id;
        $lote->ID_NotaCompra = null;
        $lote->save();

        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Crear Lote',
                'metodo' => $request->method(),
                'hora' => $horaActual,
                'tabla' => 'lote',
                'registroId' => $lote->id,
                'ruta' => request()->fullurl(),
            ]);
        }

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
        return view('3_Inventario_Y_Productos.lotes.editar', compact('lote', 'productos', 'medidas', 'proveedores'));
    }

    public function actualizar(Request $request, $id)
    {
        $lote = Lote::find($id);

        $request->validate([
            'numeroLote' => 'required',
            'fechaCompra' => 'required',
            'productos.*.producto_id' => 'required',
            'productos.*.cantidad' => 'required',
            'productos.*.cantidadA' => 'required',
            'productos.*.medida_id' => 'required',
            'productos.*.precioCompra' => 'required',
        ]);

        $lote->numeroLote = $request->numeroLote;
        $lote->fechaCompra = $request->fechaCompra;
        $lote->fechaVencimiento = $request->fechaVencimiento;
        $lote->estado = true;
        $lote->ID_Proveedor = $request->proveedor_id;
        $lote->save();

        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Editar Lote',
                'metodo' => $request->method(),
                'hora' => $horaActual,
                'tabla' => 'lote',
                'registroId' => $lote->id,
                'ruta' => request()->fullurl(),
            ]);
        }

        LoteProd::where('ID_Lote', $lote->id)->delete();

        foreach ($request->productos as $productoData) {
            $producto_id = $productoData['producto_id'];
            $cantidad = $productoData['cantidad'];
            $cantidadA = $productoData['cantidadA'];
            $medida_id = $productoData['medida_id'];
            $precioCompra = $productoData['precioCompra'];

            $loteprod = new LoteProd();
            $loteprod->ID_Lote = $lote->id;
            $loteprod->ID_Producto = $producto_id;
            $loteprod->cantidadComprada = $cantidad;
            $loteprod->cantidadActual = $cantidadA;
            $loteprod->ID_Medida = $medida_id;
            $loteprod->precioCompra = $precioCompra;
            $loteprod->save();
        }

        return redirect(route('lotes.inicio'))->with('actualizado', 'Lote actualizado exitosamente');
    }

    public function eliminar($id)
    {
        $lote = Lote::where('id', '=', $id)->first();
        $lote->loteprod()->delete();
        $numeroLote = $lote->numeroLote;
        $lote->delete();

        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Eliminar Lote',
                'metodo' => request()->method(),
                'hora' => $horaActual,
                'tabla' => 'lote',
                'registroId' => $id,
                'ruta' => request()->fullurl(),
            ]);
        }

        return redirect(route('lotes.inicio'))->with('eliminado', 'Lote ' . $numeroLote . ' eliminado exitosamente');
    }

    public function reembolsarInicio()
    {
        $lotes = Lote::all();
        return (view('3_Inventario_Y_Productos.lotes.reembolsarInicio', compact('lotes')));
    }

    public function reembolsar($id)
    {
        $lote = Lote::find($id);
        $productos = Producto::all();
        $medidas = Medida::all();
        $proveedores = Proveedor::all();
        return view('3_Inventario_Y_Productos.lotes.reembolsar', compact('lote', 'productos', 'medidas', 'proveedores'));
    }

    public function reembolsaractualizar($id)
    {
        $lote = Lote::find($id);
        $lote->estado = false;
        $lote->save();
        return redirect(route('lotes.inicio'))->with('actualizado', 'Lote mandado al proceso de reembolso exitosamente');
    }

    public function reembolsarAceptado($id)
    {
        $lote = Lote::find($id);
        $productos = Producto::all();
        $medidas = Medida::all();
        $proveedores = Proveedor::all();
        return view('3_Inventario_Y_Productos.lotes.reembolsarAceptado', compact('lote', 'productos', 'medidas', 'proveedores'));
    }

    public function reembolsaractualizar1(Request $request, $id)
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
        $lote->estado = true;
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

        return redirect(route('lotes.reembolsarInicio'))->with('actualizado', 'Lote actualizado exitosamente');
    }

    public function actualizarReembolso($id)
    {
        $lote = Lote::find($id);
        $lote->estado = true;
        $lote->save();
        return redirect(route('lotes.reembolsarInicio'))->with('actualizado', 'Lote reembolsado exitosamente');
    }

    public function eliminarProdR($id)
    {
        $lote = Lote::where('id', '=', $id)->first();
        $lote->loteprod()->delete();
        $numeroLote = $lote->numeroLote;
        $lote->delete();
        return redirect(route('lotes.reembolsarInicio'))->with('eliminado', 'Lote ' . $numeroLote . ' eliminado exitosamente');
    }
}
