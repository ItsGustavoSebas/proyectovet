<?php

namespace App\Providers;

use Illuminate\Auth\Events\Login;
use App\Listeners\LogSuccessfulLogin;
use Illuminate\Auth\Events\Logout;
use App\Listeners\LogSuccessfulLogout;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'eloquent.created: App\Models\TratamientoDeLaConsulta' => [
            'App\Observers\TratamientoDeLaConsultaObserver@created',
        ],
        'eloquent.deleted: App\Models\TratamientoDeLaConsulta' => [
            'App\Observers\TratamientoDeLaConsultaObserver@deleted',
        ],
        'eloquent.created: App\Models\LoteProd' => [
            'App\Observers\LoteProdObserver@created',
        ],
        'eloquent.updated: App\Models\LoteProd' => [
            'App\Observers\LoteProdObserver@updated',
        ],
        'eloquent.deleted: App\Models\LoteProd' => [
            'App\Observers\LoteProdObserver@deleted',
        ],
        'eloquent.created: App\Models\Consulta' => [
            'App\Observers\ConsultaObserver@created',
        ],
        'eloquent.updated: App\Models\Consulta' => [
            'App\Observers\ConsultaObserver@updated',
        ],
        'eloquent.deleted: App\Models\Consulta' => [
            'App\Observers\ConsultaObserver@deleted',
        ],
        'eloquent.created: App\Models\detalleservicio' => [
            'App\Observers\DetalleServicioObserver@created',
        ],
        'eloquent.updated: App\Models\detalleservicio' => [
            'App\Observers\DetalleServicioObserver@updated',
        ],
        'eloquent.deleted: App\Models\detalleservicio' => [
            'App\Observers\DetalleServicioObserver@deleted',
        ],
            Login::class => [
            LogSuccessfulLogin::class,
        ],
            Logout::class => [
            LogSuccessfulLogout::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
