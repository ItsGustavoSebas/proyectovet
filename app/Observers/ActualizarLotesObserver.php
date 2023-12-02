<?php

namespace App\Observers;

use App\Models\Detalle_Venta;
use App\Models\LoteProd;

class ActualizarLotesObserver
{
    /**
     * Handle the Detalle_Venta "created" event.
     *
     * @param  \App\Models\Detalle_Venta  $detalle_Venta
     * @return void
     */
    public function created(Detalle_Venta $detalle_Venta)
    {
        $cantidad = $detalle_Venta->cantidad;
        $productoID = $detalle_Venta->ID_Producto;

        // Obtener lotes del producto por ID, ordenados por fecha de vencimiento ascendente
        $lotesprod = LoteProd::where('ID_Producto', $productoID)
            ->join('lote', 'lote.ID', '=', 'loteprod.ID_Lote')
            ->orderBy('lote.fechaVencimiento', 'asc')
            ->get();

        $cant = 0;

        foreach ($lotesprod as $loteprod) {
            if ($cantidad > $cant) {
                if ($cantidad - $cant <= $loteprod->cantidadActual) {
                    $loteprod->cantidadActual -= ($cantidad - $cant);
                    $cant += ($cantidad - $cant);
                } else {
                    $cant += $loteprod->cantidadActual;
                    $loteprod->cantidadActual = 0;
                }
                $loteprod->save(); // Guardar los cambios en cada lote
            }
        }
    }

    /**
     * Handle the Detalle_Venta "updated" event.
     *
     * @param  \App\Models\Detalle_Venta  $detalle_Venta
     * @return void
     */
    public function updated(Detalle_Venta $detalle_Venta)
    {
        //
    }

    /**
     * Handle the Detalle_Venta "deleted" event.
     *
     * @param  \App\Models\Detalle_Venta  $detalle_Venta
     * @return void
     */
    public function deleted(Detalle_Venta $detalle_Venta)
    {
        //
    }

    /**
     * Handle the Detalle_Venta "restored" event.
     *
     * @param  \App\Models\Detalle_Venta  $detalle_Venta
     * @return void
     */
    public function restored(Detalle_Venta $detalle_Venta)
    {
        //
    }

    /**
     * Handle the Detalle_Venta "force deleted" event.
     *
     * @param  \App\Models\Detalle_Venta  $detalle_Venta
     * @return void
     */
    public function forceDeleted(Detalle_Venta $detalle_Venta)
    {
        //
    }
}
