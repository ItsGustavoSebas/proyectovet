<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\RecetaMedica;
use App\Models\DetalleReceta;
use App\Models\Producto;
use App\Models\Consulta;
use App\Models\Mascota;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\User;
use Illuminate\Http\Request;

class RecetaMedicaController extends Controller
{

    public function crear($id_Consulta)
    {
        $productos = Producto::all();
        $consultas = Consulta::where('id', '=', $id_Consulta)->first();
        $idEmpleado = auth()->id();
        return view('2_Mascotas_Y_Atencion_Veterinaria.RecetaMedica.crear', compact('productos', 'consultas', 'idEmpleado'));
    }

    public function guardar(REQUEST $request)
    {
        $request->validate([
            'ID_Consulta' => 'required',
            'productos' => 'required|array',
        ]);
        $recetamedica = new RecetaMedica();
        $recetamedica->FechaEmision = $request->FechaEmision;
        $recetamedica->ID_Consulta = $request->ID_Consulta;
        $recetamedica->ID_Empleado = auth()->id();
        $recetamedica->save();

        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Crear Receta Medica',
                'metodo' => $request->method(),
                'hora' => $horaActual,
                'tabla' => 'receta_medica',
                'registroId' => $recetamedica->id,
                'ruta'=> request()->fullurl(),
            ]);
        }
        foreach ($request->productos as $productoData) {
            $producto_id = $productoData['producto_id'];
            $cantidad = $productoData['cantidad'];
            $instrucciones = $productoData['instrucciones'];

            $detalleReceta = new DetalleReceta();
            $detalleReceta->ID_RecetaMedica = $recetamedica->id;
            $detalleReceta->ID_Producto = $producto_id;
            $detalleReceta->Cantidad = $cantidad;
            $detalleReceta->instrucciones = $instrucciones;
            $detalleReceta->save();

            $bitacora_id = session('bitacora_id');

            if ($bitacora_id) {
                $bitacora = Bitacora::find($bitacora_id);

                $horaActual = now()->format('H:i:s');

                $bitacora->detalleBitacoras()->create([
                    'accion' => 'Añadir Producto Del Receta Medica',
                    'metodo' => request()->method(),
                    'hora' => $horaActual,
                    'tabla' => 'detalle_receta',
                    'registroId' => $detalleReceta->id,
                    'ruta' => request()->fullurl(),
                ]);
            }
        }

        return redirect(route('consulta.acciones', $recetamedica->ID_Consulta))->with('creado', 'Receta Médica añadido exitosamente');
    }

    public function editar($id)
    {
        $detalleReceta = DetalleReceta::where('id', $id)->first();
        $recetamedica = RecetaMedica::all();
        return view('2_Mascotas_Y_Atencion_Veterinaria.RecetaMedica.editar', compact('detalleReceta', 'recetamedica'));
    }

    public function eliminar($id)
    {
        $recetamedica = RecetaMedica::where('id','=', $id)->first(); 
        // $detalleReceta = DetalleReceta::where('id', $id)->first();       
            $ID_Consulta = $recetamedica->ID_Consulta;
        // $recetamedica->detalle_receta()->delete();
        // $numReceta = $recetamedica->numReceta;
        $recetamedica->delete();

        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Eliminar Receta Medica',
                'metodo' => request()->method(),
                'hora' => $horaActual,
                'tabla' => 'receta_medica',
                'registroId' => $id,
                'ruta'=> request()->fullurl(),
            ]);
        }

        return redirect(route('consulta.acciones', $ID_Consulta))->with('eliminado', 'Receta Médica eliminada exitosamente');
    }

    public function actualizar(REQUEST $request, $id)
    {
        $request->validate([
            'FechaEmision' => 'required',
            'ID_Consulta' => 'required',
        ]);
        $recetamedica = RecetaMedica::find($id);
        $recetamedica->FechaEmision = $request->FechaEmision;
        $recetamedica->ID_Consulta = $request->ID_Consulta;
        $recetamedica->ID_Empleado = auth()->id();
        $recetamedica->save();

        //Crear DetalleBitacora

        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => 'Crear Receta Medica',
                'metodo' => $request->method(),
                'hora' => $horaActual,
                'tabla' => 'receta_medica',
                'registroId' => $recetamedica->id,
                'ruta'=> request()->fullurl(),
            ]);
        }

        foreach ($request->productos as $productoData) {
            $producto_id = $productoData['producto_id'];
            $cantidad = $productoData['cantidad'];
            $instrucciones = $productoData['instrucciones'];

            $detalleReceta = new DetalleReceta();
            $detalleReceta->ID_RecetaMedica = $recetamedica->id;
            $detalleReceta->ID_Producto = $producto_id;
            $detalleReceta->Cantidad = $cantidad;
            $detalleReceta->instrucciones = $instrucciones;
            $detalleReceta->save();
        }
        return redirect(route('consulta.acciones', $request->ID_Consulta))->with('actualizado', 'Receta Médica  actualizada correctamente');
    }

    public function generarRecetaMedicaPDF($ID_Consulta){
        $consulta = Consulta::where('id', '=', $ID_Consulta)->first();
        $mascota = Mascota::where('id', '=', $consulta->ID_Mascota)->first();
        $recetas_medica = RecetaMedica::where('ID_Consulta', '=', $ID_Consulta)->get();
        $data = [
            'recetas_medica' => $recetas_medica,
            'mascota' => $mascota,
        ];

        $pdf = Pdf::loadView('PDF.receta', $data);

        return $pdf->stream('Receta-mascota.pdf');
    }



}


