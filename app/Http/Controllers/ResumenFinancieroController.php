<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\Cita;
use App\Models\Consulta;
use App\Models\Detalle_Venta;
use App\Models\detalleservicio;
use App\Models\Nota_Venta;
use App\Models\Producto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResumenFinancieroController extends Controller
{
    public function inicio()
    {
        $fechaHoy = Carbon::today();

        $cantidadEntradasHoy = Bitacora::whereDate('entrada', $fechaHoy)
            ->distinct('ID_Usuario')
            ->count('ID_Usuario');
        $fechaAyer = Carbon::yesterday()->toDateString();
        $cantidadEntradasAyer = Bitacora::whereDate('entrada', $fechaAyer)
            ->distinct('ID_Usuario')
            ->count('ID_Usuario');

        // Calcular el porcentaje de cambio
        $porcentajeCambioEntradas = 0;
        if ($cantidadEntradasAyer > 0) {
            $porcentajeCambioEntradas = (($cantidadEntradasHoy - $cantidadEntradasAyer) / $cantidadEntradasAyer) * 100;
        }
        $cantidadCitasHoy = Cita::whereDate('fechaProgramada', $fechaHoy)->where('activo', true)->count();
        $cantidadCitasHoyTotal = Cita::whereDate('fechaProgramada', $fechaHoy)
            ->count();
        $porcentajeCitasPendientes = 0;
        if ($cantidadCitasHoyTotal > 0) {
            $porcentajeCitasPendientes = ($cantidadCitasHoy / $cantidadCitasHoyTotal) * 100;
        }

        $cantidadVentaHoy = Nota_Venta::whereDate('fecha', $fechaHoy)->count();
        $cantidadVentaAyer = Nota_Venta::whereDate('fecha', $fechaAyer)->count();

        $porcentajeCambioVentasDia = 0;
        if ($cantidadVentaAyer > 0) {
            $porcentajeCambioVentasDia = (($cantidadVentaHoy - $cantidadVentaAyer) / $cantidadVentaAyer) * 100;
        }

        $primerDiaMesActual = Carbon::now()->startOfMonth()->toDateString();
        $ultimoDiaMesActual = Carbon::now()->endOfMonth()->toDateString();
        $cantidadVentasMesActual = Nota_Venta::whereBetween('fecha', [$primerDiaMesActual, $ultimoDiaMesActual])->count();

        $primerDiaMesAnterior = Carbon::now()->subMonth()->startOfMonth()->toDateString();
        $ultimoDiaMesAnterior = Carbon::now()->subMonth()->endOfMonth()->toDateString();
        $cantidadVentasMesAnterior = Nota_Venta::whereBetween('fecha', [$primerDiaMesAnterior, $ultimoDiaMesAnterior])->count();

        $porcentajeCambioVentasMes = 0;
        if ($cantidadVentasMesAnterior > 0) {
            $porcentajeCambioVentasMes = (($cantidadVentasMesActual - $cantidadVentasMesAnterior) / $cantidadVentasMesAnterior) * 100;
        }
        $inicioOnceDias = $fechaHoy->copy()->subDays(10); // inicio hace 11 días
        $finHoy = $fechaHoy->copy(); // fin es el día actual
        $ventasPorDia = Detalle_Venta::selectRaw('DATE(nota_venta.fecha) as fecha_venta, SUM(detalle_venta.precio) as total_precio')
            ->join('nota_venta', 'detalle_venta.ID_Nota_Venta', '=', 'nota_venta.id')
            ->whereBetween('nota_venta.fecha', [$inicioOnceDias, $finHoy])
            ->groupBy('fecha_venta')
            ->orderBy('fecha_venta')
            ->get();
        $citasUltimos11Dias = Cita::selectRaw('DATE("fechaProgramada") as fecha_cita, SUM("montoTotal") as total_precio')
            ->where('activo', false)
            ->whereBetween('fechaProgramada', [$inicioOnceDias, $finHoy])
            ->groupBy('fecha_cita')
            ->orderBy('fecha_cita')
            ->get();
        $citasPorTipoHoy = Cita::selectRaw('tipo, COUNT(*) as cantidad')
            ->whereDate('fechaProgramada', $fechaHoy)
            ->where('activo', true)
            ->groupBy('tipo')
            ->get();
        return view(
            '4_Ventas_Y_Finanzas.ResumenFinanciero.resumenes_financieros',
            compact(
                'cantidadEntradasHoy',
                'cantidadCitasHoy',
                'cantidadVentaHoy',
                'cantidadVentasMesActual',
                'ventasPorDia',
                'citasUltimos11Dias',
                'citasPorTipoHoy',
                'porcentajeCambioEntradas',
                'porcentajeCitasPendientes',
                'porcentajeCambioVentasDia',
                'porcentajeCambioVentasMes'
            )
        );
    }

    public function ventas_semanal()
    {
        $hoy = Carbon::now()->startOfDay();
        $inicioSemana = $hoy->copy()->startOfWeek();
        $finSemana = $hoy->copy()->endOfWeek();
        $ventasPorDia = Nota_Venta::selectRaw('DATE("fecha") as fecha, SUM("montoTotal") as total')
            ->whereBetween('fecha', [$inicioSemana, $finSemana])
            ->groupBy('fecha')
            ->orderBy('fecha')
            ->get();
        return view('4_Ventas_Y_Finanzas.ResumenFinanciero.ventas_semanal', compact('ventasPorDia'));
    }

    public function ventas_año()
    {
        $ventasPorMes = Nota_Venta::selectRaw('EXTRACT(YEAR FROM "fecha") as year, EXTRACT(MONTH FROM "fecha") as month, SUM("montoTotal") as total')
            ->whereRaw('EXTRACT(YEAR FROM "fecha") = ?', [Carbon::now()->year])
            ->groupByRaw('EXTRACT(YEAR FROM "fecha"), EXTRACT(MONTH FROM "fecha")')
            ->orderByRaw('EXTRACT(YEAR FROM "fecha")')
            ->orderByRaw('EXTRACT(MONTH FROM "fecha")')
            ->get();
        return view('4_Ventas_Y_Finanzas.ResumenFinanciero.ventas_año', compact('ventasPorMes'));
    }

    public function ventas_mes()
    {
        // Obtener ventas por semana para el mes actual
        $ventasPorSemana = Nota_Venta::selectRaw('EXTRACT(YEAR FROM "fecha") as year, EXTRACT(MONTH FROM "fecha") as month, DATE_PART(\'week\', "fecha") as week, SUM("montoTotal") as total')
            ->whereYear('fecha', Carbon::now()->year)
            ->whereMonth('fecha', Carbon::now()->month)
            ->groupBy('year', 'month', 'week')
            ->orderBy('year')
            ->orderBy('month')
            ->orderBy('week')
            ->get();

        return view('4_Ventas_Y_Finanzas.ResumenFinanciero.ventas_mensual', compact('ventasPorSemana'));
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
        return view('4_Ventas_Y_Finanzas.ResumenFinanciero.clientes_frecuentes_compras', compact('clientesFrecuentes'));
    }

    public function clientesFrecuentesAtencionVeterinaria()
    {
        $clientesFrecuentes = DB::table('citas')
            ->select('ID_Cliente')
            ->selectRaw('COUNT(*) as total_citas')
            ->selectRaw('SUM(CASE WHEN tipo = \'consulta\' THEN 1 ELSE 0 END) as total_consultas')
            ->selectRaw('SUM(CASE WHEN tipo = \'servicio\' THEN 1 ELSE 0 END) as total_servicios')
            ->where('activo', 0)
            ->groupBy('ID_Cliente')
            ->havingRaw('COUNT(*) >= 1')
            ->orderByDesc('total_citas')
            ->get();

        return view('4_Ventas_Y_Finanzas.ResumenFinanciero.clientes_frecuentes_veterinaria', compact('clientesFrecuentes'));
    }

    public function serviciosPopulares()
    {
        $cantidadConsultas = Consulta::count();
        $cantidadServicios = DetalleServicio::selectRaw('count(*) as cantidad, servicios.nombre')
            ->leftJoin('servicios', 'detalleservicio.ID_Servicio', '=', 'servicios.id')
            ->groupBy('detalleservicio.ID_Servicio', 'servicios.nombre')
            ->get();
        return view('4_Ventas_Y_Finanzas.ResumenFinanciero.serviciosPopulares', compact('cantidadServicios', 'cantidadConsultas'));
    }

    public function productosMasVendidos()
    {
        $productosMasVendidos = Producto::select('producto.nombre', DB::raw('SUM(detalle_venta.cantidad) as total_vendido'))
            ->join('detalle_venta', 'producto.id', '=', 'detalle_venta.ID_Producto')
            ->groupBy('producto.id', 'producto.nombre')
            ->orderByDesc('total_vendido')
            ->take(20)
            ->get();
        return view('4_Ventas_Y_Finanzas.ResumenFinanciero.productosMasVendidos', compact('productosMasVendidos'));
    }
}
