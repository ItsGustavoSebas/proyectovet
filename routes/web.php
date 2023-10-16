<?php

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
    Route::post('/usuarios/guardar', [UserController::class, 'guardar'])->name('usuarios.guardar');
    Route::get('/productos', [ProductoController::class, 'inicio'])->name('producto.inicio');

    Route::get('/usuarios/crearv2', [UserController::class, 'rcrear'])->name('usuarios.crearv2');
    Route::post('/usuarios/rguardar', [UserController::class, 'rguardar'])->name('usuarios.rguardar');
    Route::get('/usuarios/rinicio', [UserController::class, 'rinicio'])->name('usuarios.rinicio');
    Route::get('/usuarios/reditar/{id}', [UserController::class, 'reditar'])->name('usuarios.reditar');
    Route::post('/usuarios/ractualizar/{id}', [UserController::class, 'ractualizar'])->name('usuarios.ractualizar');
    Route::post('/usuarios/reliminar/{id}', [UserController::class, 'reliminar'])->name('usuarios.reliminar');

    Route::get('/servicios', [ServiciosController::class, 'inicio'])->name('servicios.inicio');
});
