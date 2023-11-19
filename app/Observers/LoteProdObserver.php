<?php

namespace App\Observers;

use App\Models\LoteProd;

class LoteProdObserver
{
    public function created(LoteProd $loteprod)
    {
        $this->actualizarCantidadProducto($loteprod);
    }

    public function updated(LoteProd $loteprod)
    {
        $this->actualizarCantidadProducto($loteprod);
    }

    public function deleted(LoteProd $loteprod)
    {
        $this->actualizarCantidadProducto($loteprod);
    }

    private function actualizarCantidadProducto(LoteProd $loteprod)
    {
        $producto = $loteprod->producto; // Asumiendo la relación con el modelo Producto
        $lote = $loteprod->lote; // Asumiendo la relación con el modelo Lote

        if ($producto && $lote && $lote->estado) {
            $cantidadGeneral = LoteProd::where('ID_Producto', $producto->id)
                ->whereHas('lote', function ($query) {
                    $query->where('estado', true);
                })
                ->sum('cantidadActual');

            $producto->update([
                'cantidadGeneral' => $cantidadGeneral
            ]);
        }
    }
}