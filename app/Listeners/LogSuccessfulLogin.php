<?php

namespace App\Listeners;

use App\Models\Bitacora;
use App\Models\DetalleBitacora;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Carbon;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $tipo = null;

        if ($event->user->cliente && !$event->user->empleado) {
            $tipo = 'Cliente';
        } elseif (!$event->user->cliente && $event->user->empleado) {
            $tipo = 'Empleado';
        } elseif ($event->user->cliente && $event->user->empleado) {
            $tipo = 'Cliente y Empleado';
        }

        
        $bitacora = $event->user->bitacoras()->create([
            'entrada' => now(),
            'salida'=> null,
            'usuario' => $event->user->name,
            'tipo' => $tipo,
            'direccionIp' => request()->ip(),
            'navegador' => request()->header('user-agent'),
        ]);

        $horaActual = Carbon::now()->format('H:i:s');

        $bitacora->detalleBitacoras()->create([
            'accion' => 'Iniciar Sesión',
            'metodo' => request()->method(),
            'hora' => $horaActual,
            'tabla'=> 'usuarios',
            'registroId' => null,
            'ruta'=> request()->fullurl(),
        ]);

        session(['bitacora_id' => $bitacora->id]);

    }
}
