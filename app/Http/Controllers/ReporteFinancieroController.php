<?php

namespace App\Http\Controllers;

use App\Models\Nota_Venta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteFinancieroController extends Controller
{
    public function inicio()
    {
        return view('reporte.resumenes_financieros');
    }

    public function ventas_semanal()
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
        return view('reporte.ventas_semanal', compact('ventasPorDia'));
    }

    public function ventas_año()
    {
        // Obtener ventas por mes para el año actual
        $ventasPorMes = Nota_Venta::selectRaw('YEAR(fecha) as year, MONTHNAME(fecha) as month, SUM(montoTotal) as total')
            ->whereYear('fecha', Carbon::now()->year)
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderByRaw('MONTH(fecha)')
            ->get();

        return view('reporte.ventas_año', compact('ventasPorMes'));
    }

    public function ventas_mes()
    {
        // Obtener ventas por semana para el mes actual
        $ventasPorSemana = Nota_Venta::selectRaw('YEAR(fecha) as year, MONTH(fecha) as month, WEEK(fecha) as week, SUM(montoTotal) as total')
            ->whereYear('fecha', Carbon::now()->year)
            ->whereMonth('fecha', Carbon::now()->month)
            ->groupBy('year', 'month', 'week')
            ->orderBy('year')
            ->orderBy('month')
            ->orderBy('week')
            ->get();

        return view('reporte.ventas_mensual', compact('ventasPorSemana'));
    }

    public function clientesFrecuentesCompras()
    {
        // Obtener clientes frecuentes basados en ventas y detalles de venta
        $clientesFrecuentes = Nota_Venta::select('ID_Cliente')
            ->selectRaw('COUNT(*) as total_ventas') // Calcular el conteo de ventas
            ->whereIn('id', function ($query) {
                $query->select('ID_Nota_Venta')
                    ->from('detalle_venta')
                    ->whereColumn('detalle_venta.ID_Nota_Venta', 'nota_venta.id');
            })
            ->groupBy('ID_Cliente')
            ->havingRaw('COUNT(*) >= 1')
            ->orderByRaw('total_ventas DESC') // Ordenar por la cantidad de ventas
            ->get();
        return view('reporte.clientes_frecuentes_compras', compact('clientesFrecuentes'));
    }

    public function clientesFrecuentesAtencionVeterinaria()
{
    $clientesFrecuentes = DB::table('citas')
        ->select('ID_Cliente')
        ->selectRaw('COUNT(*) as total_citas')
        ->selectRaw('SUM(CASE WHEN tipo = "consulta" THEN 1 ELSE 0 END) as total_consultas')
        ->selectRaw('SUM(CASE WHEN tipo = "servicio" THEN 1 ELSE 0 END) as total_servicios')
        ->where('activo', false)
        ->groupBy('ID_Cliente')
        ->havingRaw('COUNT(*) >= 1')
        ->orderByRaw('total_citas DESC')
        ->get();

    return view('reporte.clientes_frecuentes_veterinaria', compact('clientesFrecuentes'));
}
}
