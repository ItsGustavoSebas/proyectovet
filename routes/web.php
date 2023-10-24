<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\ProductoController;

use App\Http\Controllers\ServiciosController;

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

    Route::get('/clientes', [ClienteController::class, 'inicio'])->name('clientes.inicio');
    Route::get('/clientes/editar/{id}', [ClienteController::class, 'editar'])->name('clientes.editar');
    Route::post('/clientes/actualizar/{id}', [ClienteController::class, 'actualizar'])->name('clientes.actualizar');
    Route::post('/clientes/eliminar/{id}', [ClienteController::class, 'eliminar'])->name('clientes.eliminar');
    Route::get('/clientes/crear', [ClienteController::class, 'crear'])->name('clientes.crear');
    Route::post('/clientes/guardar', [ClienteController::class, 'guardar'])->name('clientes.guardar');

    Route::get('/empleados/crear', [UserController::class, 'rcrear'])->name('usuarios.rcrear');
    Route::post('/empleados/guardar', [UserController::class, 'rguardar'])->name('usuarios.rguardar');
    Route::get('/empleados/inicio', [UserController::class, 'rinicio'])->name('usuarios.rinicio');
    Route::get('/empleados/editar/{id}', [UserController::class, 'reditar'])->name('usuarios.reditar');
    Route::post('/empleados/actualizar/{id}', [UserController::class, 'ractualizar'])->name('usuarios.ractualizar');
    Route::post('/empleados/eliminar/{id}', [UserController::class, 'reliminar'])->name('usuarios.reliminar');
 


    Route::get('/servicios', [ServiciosController::class, 'inicio'])->name('servicios.inicio');

    Route::get('/mascotas/rinicio', [MascotaController::class, 'rinicio'])->name('mascotas.rinicio');
    Route::get('/mascotas/inicio/{id}', [MascotaController::class, 'inicio'])->name('mascotas.inicio');
    Route::get('/mascotas/{id}/crear', [MascotaController::class, 'crear'])->name('mascotas.crear');
    Route::post('/mascotas/guardar', [MascotaController::class, 'guardar'])->name('mascotas.guardar');
    Route::get('/mascotas/editar/{id}', [MascotaController::class, 'editar'])->name('mascotas.editar');
    Route::post('/mascotas/actualizar/{id}', [MascotaController::class, 'actualizar'])->name('mascotas.actualizar');
    Route::post('/mascotas/eliminar/{id}', [MascotaController::class, 'eliminar'])->name('mascotas.eliminar');
});
