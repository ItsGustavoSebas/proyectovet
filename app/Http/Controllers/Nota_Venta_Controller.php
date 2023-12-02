<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Cita;
use App\Models\Cliente;
use App\Models\Detalle_Venta;
use App\Models\Factura;
use App\Models\Nota_Venta;
use App\Models\Producto;
use App\Models\Recibo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Nota_Venta_Controller extends Controller
{
    public function inicio()
    {
        $nota_ventas = Nota_Venta::all();
        return (view('4_Ventas_Y_Finanzas.nota_venta.inicio', compact('nota_ventas')));
    }

    public function crear()
    {
        $productos = Producto::all();
        $clientes = Cliente::all();
        $qrUrl = ''; // URL del QR, deberá ser generada
        return view('4_Ventas_Y_Finanzas.nota_venta.crear', compact('productos', 'clientes', 'qrUrl'));
    }

    public function obtenerCitasPorCliente($clienteId)
    {
        // Buscar al cliente por su ID
        $cliente = Cliente::find($clienteId);

        if (!$cliente) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }

        // Obtener todas las citas asociadas a ese cliente
        $citas = Cita::where('ID_Cliente', $clienteId)
            ->where('activo', false)
            ->where('ID_Nota_Venta', null)
            ->get(); // Suponiendo que tienes una relación definida en el modelo Cliente

        // Preparar los datos de las citas para enviar como respuesta
        $citasData = $citas->map(function ($cita) {
            return [
                'id' => $cita->id,
                'descripcion' => $cita->descripcion, // Reemplaza 'fecha' con el atributo correspondiente de la cita
                // Otros atributos que desees enviar
            ];
        });

        return response()->json($citasData);
    }

    public function guardar(Request $request)
    {
        $request->validate([
            'cliente' => 'required',
        ]);

        $notaVenta = new Nota_Venta();
        $notaVenta->montoTotal = $request->monto_total;
        $notaVenta->fecha = Carbon::now();
        $notaVenta->ID_Cliente = $request->cliente;

        $notaVenta->ID_Empleado = Auth::id();
        if ($request->has('qr')) {
            $notaVenta->qr = true;
        }else{
            $notaVenta->qr = false;
        }
        $notaVenta->save();
        if ($request->has('recibo')) {
            $notaVenta->factura = false;
            $notaVenta->recibo = true;
            $recibo = new Recibo();
            $recibo->ID_Nota_Venta = $notaVenta->id;
            $recibo->save();
        } else if($request->has('factura')){
            $notaVenta->factura = true;
            $notaVenta->recibo = false;
            $factura = new Factura();
            $factura->ID_Nota_Venta = $notaVenta->id;
            $factura->nit = $request->nit;
            $factura->save();
        }
        $notaVenta->save();
        foreach ($request->productos as $productoData) {
            if (!empty($productoData['producto_id'])) {
                $producto_id = $productoData['producto_id'];
                $cantidad = $productoData['cantidad'];
                $precio = $productoData['precio'];

                $detalleVenta = new Detalle_Venta();
                $detalleVenta->ID_Producto = $producto_id;
                $detalleVenta->ID_Nota_Venta = $notaVenta->id;
                $detalleVenta->cantidad = $cantidad;
                $detalleVenta->precio = $precio;
                $detalleVenta->save();
                // Puedes realizar otras operaciones necesarias para cada producto de la venta
            }
        }
        foreach ($request->citas as $citaData) {
            if (!empty($citaData['cita_id'])) {
                $cita_id = $citaData['cita_id'];
                $cita = Cita::find($cita_id);
                $cita->ID_Nota_Venta = $notaVenta->id;
                $cita->save();
                // Puedes realizar otras operaciones necesarias para cada producto de la venta
            }
        }
        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Crear Nota de Venta',
                'metodo' => $request->method(),
                'hora' => $horaActual,
                'tabla' => 'nota_venta',
                'registroId' => $notaVenta->id,
                'ruta'=> request()->fullurl(),
            ]);
        }
        if ($request->has('recibo')) {
            return redirect()->route('generarReciboPDF', ['id' => $notaVenta->id]);
        } else if($request->has('factura')){
            return redirect()->route('generarFactura', ['id' => $notaVenta->id]);
        }
        // Redirige a donde sea necesario después de guardar la Nota de Venta
        return redirect(route('nota_venta.acciones', $notaVenta->id))->with('creado', 'Nota de Venta añadida exitosamente');
    }
    

    public function eliminar($id)
    {
        $notaVenta = Nota_Venta::where('id', '=', $id)->first();
        $notaVenta->detalleVenta()->delete();
        $notaVenta->delete();

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

        return redirect(route('nota_venta.inicio'))->with('eliminado', 'Nota de venta eliminada exitosamente');
    }

    public function obtenerPrecioCita($citaId)
    {
        try {
            // Buscar la cita por su ID
            $cita = Cita::findOrFail($citaId);

            // Obtener el precio de la cita (supongamos que el precio está en un atributo 'precio' en la tabla 'citas')
            $precio = $cita->montoTotal;

            // Devolver el precio como respuesta en formato JSON
            return response()->json(['precio' => $precio]);

        } catch (\Exception $e) {
            // Manejar cualquier error que pueda surgir
            return response()->json(['error' => 'Hubo un error al obtener el precio de la cita'], 500);
        }
    }

    public function mostrarDetalles($id)
    {
        $notaVenta = Nota_Venta::findOrFail($id); // Obtener la nota de venta por su ID

        return view('4_Ventas_Y_Finanzas.Nota_Venta.detalles', ['nota_venta' => $notaVenta]);
        // Reemplaza 'ruta_de_tu_vista_detalles' con la ruta real de tu vista para los detalles
    }
}
