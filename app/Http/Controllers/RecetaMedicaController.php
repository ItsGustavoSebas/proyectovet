<?php

namespace App\Http\Controllers;

use App\Models\RecetaMedica;
use App\Models\DetalleReceta;
use App\Models\Producto;
use App\Models\Consulta;
use App\Models\Medida;
use App\Models\Empleado;
use Illuminate\Http\Request;

class RecetaMedicaController extends Controller
{

    public function crear($id_Consulta)
    {
        $productos = Producto::all();
        $consultas = Consulta::where('id', '=', $id_Consulta)->first();
        $medidas = Medida::all();
        $empleados = Empleado::all();
        return view('RecetaMedica.crear', compact('productos', 'consultas', 'medidas', 'empleados'));
    }

    public function guardar(REQUEST $request)
    {
        $request->validate([
            'numReceta' => 'required',
            'FechaEmision' => 'required',
            'ID_Consulta' => 'required',
            'ID_Empleado' => 'required',
        ]);
        $recetamedica = new RecetaMedica();
        $recetamedica->numReceta = $request->numReceta;
        $recetamedica->FechaEmision = $request->FechaEmision;
        $recetamedica->ID_Consulta = $request->ID_Consulta;
        $recetamedica->ID_Empleado = $request->empleado_id;
        $recetamedica->save();

        foreach ($request->productos as $productoData) {
            $producto_id = $productoData['producto_id'];
            $cantidad = $productoData['cantidad'];
            $medida_id = $productoData['medida_id'];
            $precioVenta = $productoData['precioVenta'];

            $detalleReceta = new DetalleReceta();
            $detalleReceta->ID_RecetaMedica = $recetamedica->id;
            $detalleReceta->ID_Producto = $producto_id;
            $detalleReceta->cantidad = $cantidad;
            $detalleReceta->ID_Medida = $medida_id;
            $detalleReceta->precioVenta = $precioVenta;
            $detalleReceta->save();
        }

        return redirect(route('consulta.acciones', $recetamedica->ID_Consulta))->with('creado', 'Receta Médica añadido exitosamente');
    }

    public function editar($id)
    {
        $detalleReceta = DetalleReceta::where('id', $id)->first();
        $recetamedica = RecetaMedica::all();
        return view('RecetaMedica.editar', compact('detalleReceta', 'recetamedica'));
    }

    public function eliminar($id)
    {
        $recetamedica = RecetaMedica::all();
        $detalleReceta = DetalleReceta::where('id', $id)->first();       
        $ID_Consulta = $recetamedica->ID_Consulta;
        $recetamedica->detalle_receta()>delete();
        $numReceta = $recetamedica->numReceta;
        $recetamedica->delete();
        return redirect(route('consulta.acciones', $ID_Consulta))->with('eliminado', 'Receta Médica eliminada exitosamente');
    }

    public function actualizar(REQUEST $request, $id)
    {
        $request->validate([
            'numReceta' => 'required',
            'FechaEmision' => 'required',
            'ID_Consulta' => 'required',
        ]);
        $recetamedica->numReceta = $request->numReceta;
        $recetamedica->FechaEmision = $request->FechaEmision;
        $recetamedica->ID_Consulta = $request->ID_Consulta;
        $recetamedica->ID_Empleado = $request->ID_Empleado;
        $recetamedica->save();

        foreach ($request->productos as $productoData) {
            $producto_id = $productoData['producto_id'];
            $cantidad = $productoData['cantidad'];
            $medida_id = $productoData['medida_id'];
            $precioVenta = $productoData['precioVenta'];

            $detalleReceta = new DetalleReceta();
            $detalleReceta->ID_RecetaMedica = $recetamedica->id;
            $detalleReceta->ID_Producto = $producto_id;
            $detalleReceta->cantidad = $cantidad;
            $detalleReceta->ID_Medida = $medida_id;
            $detalleReceta->precioVenta = $precioVenta;
            $detalleReceta->save();
        }
        return redirect(route('consulta.acciones', $recetamedica->ID_Consulta))->with('actualizado', 'Receta Médica  actualizada correctamente');
    }
}
