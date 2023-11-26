<?php

namespace App\Http\Controllers;

use App\Models\Nota_Venta;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReporteFinancieroController extends Controller
{
    public function inicio()
    {
        // Obtener la fecha actual y la fecha hace una semana
        $hoy = Carbon::now()->startOfDay(); // Obtiene el inicio del día actual
        $inicioSemana = $hoy->copy()->startOfWeek(); // inicio de la semana actual
        $finSemana = $hoy->copy()->endOfWeek(); // fin de la semana actual

        // Consulta para obtener las ventas por día de la semana actual
        $ventasPorDia = Nota_Venta::selectRaw('DATE(fecha) as fecha, SUM(montoTotal) as total')
            ->whereBetween('fecha', [$inicioSemana, $finSemana])
            ->groupBy('fecha')
            ->orderBy('fecha')
            ->get();
        return view('reporte.resumenes_financieros', compact('ventasPorDia'));
    }
}
