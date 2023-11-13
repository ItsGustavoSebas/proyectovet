<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\User;
use Carbon\Carbon;
use App\Models\detalleservicio;


use App\Models\Servicio;

class detalleservicioController extends Controller
{
    public function inicio($id)
    {
        $cita = Cita::where('id', '=', $id)->first();
        $servicios = Servicio::all();
        $idEmpleado = auth()->id();

        return view('detalleservicio.inicio', compact('cita', 'servicios', 'idEmpleado'));

    }


    public function servicios()
    {
        $servicios = detalleservicio::all();
        return view('detalleservicio.servicios', compact('servicios'));
    }

    public function guardar(REQUEST $request)
    {
        $request->validate([
            'Tiempo' => 'required',
            'ID_Cita' => 'required',
            'ID_Empleado' => 'required',
            'ID_Servicio' => 'required',
        ]);
        $detalleservicio = new detalleservicio();
        $detalleservicio->Tiempo = $request->Tiempo;
        $detalleservicio->ID_Cita = $request->ID_Cita;
        $detalleservicio->ID_Empleado = $request->ID_Empleado;
        $detalleservicio->ID_Servicio = $request->ID_Servicio;
        $detalleservicio->save();
        $cita = Cita::find($request->ID_Cita);
        $cita->update(['activo' => false]);
        return redirect(route('detalleservicio.servicios'))->with('creado', 'Detalle servicio añadido exitosamente');
    }

    
    public function editar($id)
    {
        $servicios = Servicio::all();
        $detalleservicio = detalleservicio::where('id', '=', $id)->first();
    
        return view('detalleservicio.editar', compact('detalleservicio','servicios'));
    }

    public function actualizar(REQUEST $request, $id)
    {
        $request->validate([
            'Tiempo' => 'required',
            'ID_Cita' => 'required',
            'ID_Empleado' => 'required',
            'ID_Servicio' => 'required',
        ]);
        $detalleservicio = detalleservicio::where('id', '=', $id)->first();
        $detalleservicio->Tiempo = $request->Tiempo;
        $detalleservicio->ID_Cita = $request->ID_Cita;
        $detalleservicio->ID_Empleado = $request->ID_Empleado;
        $detalleservicio->ID_Servicio = $request->ID_Servicio;
        $detalleservicio->save();

        return redirect(route('detalleservicio.servicios'))->with('actualizado', 'Detalle servicio actualizado exitosamente');
    }

    public function eliminar($id)
    {
        $detalleservicio = detalleservicio::where('id', '=', $id)->first();
        $detalleservicio->delete();
        return redirect(route('detalleservicio.servicios'))->with('eliminado', 'Detalle servicio eliminado exitosamente');
    }




}
