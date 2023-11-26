<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Cliente;
use App\Models\Detalle_Venta;
use App\Models\Nota_Venta;
use App\Models\Producto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Nota_Venta_Controller extends Controller
{
    public function crear()
{
    $productos = Producto::all();
    $clientes = Cliente::all();
    $citas = [];
    if ($clientes->isNotEmpty()) {
        $citas = Cita::where('ID_Cliente', $clientes[0]->id)
            ->where('activo', false)
            ->whereNotIn('id', function ($query) {
                $query->select('ID_Cita')->from('nota_venta');
            })
            ->get();
    }
    return view('nota_venta.crear', compact('productos','clientes', 'citas'));
}

public function obtenerCitasCliente(Request $request, $clienteId)
    {
        // Obtener citas del cliente con ID específico que estén inactivas y no estén asociadas a una Nota_Venta
        $citas = Cita::where('ID_Cliente', $clienteId)
            ->where('activo', false)
            ->whereDoesntHave('notasVenta', function ($query) {
                $query->whereNotNull('ID_Cita');
            })
            ->get();

        return response()->json($citas);
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
            ->whereDoesntHave('nota_venta', function ($query) {
                $query->whereNotNull('ID_Cita');
            })
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
    $notaVenta->montoTotal = 0;
    $notaVenta->fecha = Carbon::now();
    $notaVenta->ID_Cliente = $request->cliente;
    $notaVenta->ID_Cita = $request->cita;
    $notaVenta->ID_Empleado = Auth::id();
    $notaVenta->qr = false;
    $notaVenta->save();

    foreach ($request->productos as $productoData) {
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

    // Redirige a donde sea necesario después de guardar la Nota de Venta
    return redirect(route('nota_venta.guardar'))->with('creado', 'Nota de Venta añadida exitosamente');
}
}
