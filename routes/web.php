<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\ProductoController;

use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\ReservarController;
use App\Http\Controllers\TratamientoController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/usuarios', [UserController::class, 'inicio'])->name('usuarios.inicio');
    Route::get('/usuarios/editar/{id}', [UserController::class, 'editar'])->name('usuarios.editar');
    Route::post('/usuarios/actualizar/{id}', [UserController::class, 'actualizar'])->name('usuarios.actualizar');
    Route::post('/usuarios/eliminar/{id}', [UserController::class, 'eliminar'])->name('usuarios.eliminar');
    Route::get('/usuarios/crear', [UserController::class, 'crear'])->name('usuarios.crear');
   // Route::get('/usuarios/rcrear', [UserController::class, 'crearv2'])->name('usuarios.rcrear');
    Route::post('/usuarios/guardar', [UserController::class, 'guardar'])->name('usuarios.guardar');
    Route::get('/productos', [ProductoController::class, 'inicio'])->name('producto.inicio');

    //  Route::get('/clientes', [ClienteController::class, 'inicio'])->name('clientes.inicio');
    //  Route::get('/clientes/editar/{id}', [ClienteController::class, 'editar'])->name('clientes.editar');
    //  Route::post('/clientes/actualizar/{id}', [ClienteController::class, 'actualizar'])->name('clientes.actualizar');
    //  Route::post('/clientes/eliminar/{id}', [ClienteController::class, 'eliminar'])->name('clientes.eliminar');
    //  Route::get('/clientes/crear', [ClienteController::class, 'crear'])->name('clientes.crear');
    //  Route::post('/clientes/guardar', [ClienteController::class, 'guardar'])->name('clientes.guardar');

    //  Route::get('/empleados/crear', [UserController::class, 'rcrear'])->name('usuarios.rcrear');
    //  Route::post('/empleados/guardar', [UserController::class, 'rguardar'])->name('usuarios.rguardar');
    //  Route::get('/empleados/inicio', [UserController::class, 'rinicio'])->name('usuarios.rinicio');
    //  Route::get('/empleados/editar/{id}', [UserController::class, 'reditar'])->name('usuarios.reditar');
    //  Route::post('/empleados/actualizar/{id}', [UserController::class, 'ractualizar'])->name('usuarios.ractualizar');
    //  Route::post('/empleados/eliminar/{id}', [UserController::class, 'reliminar'])->name('usuarios.reliminar');
 

    Route::get('/usuarios/clientes/inicio', [ClienteController::class, 'inicio'])->name('clientes2.inicio');
    Route::get('/usuarios/clientes/editar/{id}', [ClienteController::class, 'editar'])->name('clientes2.editar');
    Route::post('/usuarios/clientes/actualizar/{id}', [ClienteController::class, 'actualizar'])->name('clientes2.actualizar');
    Route::post('/usuarios/clientes/eliminar/{id}', [ClienteController::class, 'eliminar'])->name('clientes2.eliminar');
    Route::get('/usuarios/clientes/crear', [ClienteController::class, 'crear'])->name('clientes2.crear');
    Route::post('/usuarios/clientes/guardar', [ClienteController::class, 'guardar'])->name('clientes2.guardar');

    Route::get('/usuarios/empleados/crear', [EmpleadoController::class, 'crear'])->name('empleados.crear');
    Route::post('/usuarios/empleados/guardar', [EmpleadoController::class, 'guardar'])->name('empleados.guardar');
    Route::get('/usuarios/empleados/inicio', [EmpleadoController::class, 'inicio'])->name('empleados.inicio');
    Route::get('/usuarios/empleados/editar/{id}', [EmpleadoController::class, 'editar'])->name('empleados.editar');
    Route::post('/usuarios/empleados/actualizar/{id}', [EmpleadoController::class, 'actualizar'])->name('empleados.actualizar');
    Route::post('/usuarios/empleados/eliminar/{id}', [EmpleadoController::class, 'eliminar'])->name('empleados.eliminar');


    Route::get('/servicios', [ServiciosController::class, 'inicio'])->name('servicios.inicio');

    Route::get('/reservas/consultar', [ReservarController::class, 'consultar'])->name('reservar.consultar');
    Route::get('/reservar/{id}', [ReservarController::class, 'inicio'])->name('reservar.inicio');
    Route::get('/reservar/consulta/{id}', [ReservarController::class, 'consultar_cliente'])->name('reservar.consultar_cliente');
    Route::post('/reservar/eliminar/{id}', [ReservarController::class, 'eliminar'])->name('reservar.eliminar');

    Route::get('/mascotas/rinicio', [MascotaController::class, 'rinicio'])->name('mascotas.rinicio');
    Route::get('/mascotas/inicio/{id}', [MascotaController::class, 'inicio'])->name('mascotas.inicio');
    Route::get('/mascotas/{id}/crear', [MascotaController::class, 'crear'])->name('mascotas.crear');
    Route::post('/mascotas/guardar', [MascotaController::class, 'guardar'])->name('mascotas.guardar');
    Route::get('/mascotas/editar/{id}', [MascotaController::class, 'editar'])->name('mascotas.editar');
    Route::post('/mascotas/actualizar/{id}', [MascotaController::class, 'actualizar'])->name('mascotas.actualizar');
    Route::post('/mascotas/eliminar/{id}', [MascotaController::class, 'eliminar'])->name('mascotas.eliminar');

    Route::get('/mascotas/historial/{id}', [HistorialController::class, 'inicio'])->name('historial.inicio');

    Route::get('/tratamientos/inicio', [TratamientoController::class, 'inicio'])->name('tratamientos.inicio');
    Route::get('/tratamientos/crear', [TratamientoController::class, 'crear'])->name('tratamientos.crear');
    Route::get('/tratamientos/editar/{id}', [TratamientoController::class, 'editar'])->name('tratamientos.editar');
    Route::post('/tratamientos/actualizar/{id}', [TratamientoController::class, 'actualizar'])->name('tratamientos.actualizar');
    Route::post('/tratamientos/eliminar/{id}', [TratamientoController::class, 'eliminar'])->name('tratamientos.eliminar');
    Route::post('/tratamientos/guardar', [TratamientoController::class, 'guardar'])->name('tratamientos.guardar');
});
