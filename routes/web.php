<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\CorreoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\LoteController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\ReservarController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TratamientoController;
use App\Http\Controllers\TratamientoDeLaConsultaController;
use App\Http\Controllers\detalleservicioController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\UserController;
use App\Models\TratamientoDeLaConsulta;
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
    Route::get('/historial/editar/{id}', [HistorialController::class, 'editar'])->name('historial.editar');
    Route::post('/historial/actualizar/{id}', [HistorialController::class, 'actualizar'])->name('historial.actualizar');
    Route::post('/historial/eliminar/{id}', [HistorialController::class, 'eliminar'])->name('historial.eliminar');

    Route::get('/tratamientos/inicio', [TratamientoController::class, 'inicio'])->name('tratamientos.inicio');
    Route::get('/tratamientos/crear', [TratamientoController::class, 'crear'])->name('tratamientos.crear');
    Route::get('/tratamientos/editar/{id}', [TratamientoController::class, 'editar'])->name('tratamientos.editar');
    Route::post('/tratamientos/actualizar/{id}', [TratamientoController::class, 'actualizar'])->name('tratamientos.actualizar');
    Route::post('/tratamientos/eliminar/{id}', [TratamientoController::class, 'eliminar'])->name('tratamientos.eliminar');
    Route::post('/tratamientos/guardar', [TratamientoController::class, 'guardar'])->name('tratamientos.guardar');
   
    Route::get('/roles/inicio', [RoleController::class, 'inicio'])->name('roles.inicio');
    Route::get('/roles/crear', [RoleController::class, 'crear'])->name('roles.crear');
    Route::get('/roles/editar/{id}', [RoleController::class, 'editar'])->name('roles.editar');
    Route::post('/roles/actualizar/{id}', [RoleController::class, 'actualizar'])->name('roles.actualizar');
    Route::post('/roles/eliminar/{id}', [RoleController::class, 'eliminar'])->name('roles.eliminar');

    Route::get('/consulta/inicio/{id}', [ConsultaController::class, 'inicio'])->name('consulta.inicio');
    Route::get('/consulta/consultas/', [ConsultaController::class, 'consultas'])->name('consulta.consultas');
    Route::post('/consulta/guardar', [ConsultaController::class, 'guardar'])->name('consulta.guardar');
    Route::get('/consulta/acciones/{id}', [ConsultaController::class, 'acciones'])->name('consulta.acciones');
    Route::get('/consulta/editar/{id}', [ConsultaController::class, 'editar'])->name('consulta.editar');
    Route::post('/consulta/actualizar/{id}', [ConsultaController::class, 'actualizar'])->name('consulta.actualizar');
    Route::post('/consulta/eliminar/{id}', [ConsultaController::class, 'eliminar'])->name('consulta.eliminar');

    Route::get('/traconsulta/crear/{id}', [TratamientoDeLaConsultaController::class, 'crear'])->name('traconsulta.crear');
    Route::post('/traconsulta/guardar/', [TratamientoDeLaConsultaController::class, 'guardar'])->name('traconsulta.guardar');
    Route::get('/traconsulta/editar/{id}', [TratamientoDeLaConsultaController::class, 'editar'])->name('traconsulta.editar');
    Route::post('/traconsulta/actualizar/{id}', [TratamientoDeLaConsultaController::class, 'actualizar'])->name('traconsulta.actualizar');
    Route::post('/traconsulta/eliminar/{id}', [TratamientoDeLaConsultaController::class, 'eliminar'])->name('traconsulta.eliminar');

    Route::get('/proveedor', [ProveedorController::class, 'inicio'])->name('proveedor.inicio');
    Route::get('/proveedor/editar/{id}', [ProveedorController::class, 'editar'])->name('proveedor.editar');
    Route::post('/proveedor/actualizar/{id}', [ProveedorController::class, 'actualizar'])->name('proveedor.actualizar');
    Route::post('/proveedor/eliminar/{id}', [ProveedorController::class, 'eliminar'])->name('proveedor.eliminar');
    Route::get('/proveedor/crear', [ProveedorController::class, 'crear'])->name('proveedor.crear');
    Route::post('/proveedor/guardar', [ProveedorController::class, 'guardar'])->name('proveedor.guardar');

    Route::get('/lotes/inicio', [LoteController::class, 'inicio'])->name('lotes.inicio');
    Route::get('/lotes/crear', [LoteController::class, 'crear'])->name('lotes.crear');
    Route::get('/lotes/editar/{id}', [LoteController::class, 'editar'])->name('lotes.editar');
    Route::post('/lotes/actualizar/{id}', [LoteController::class, 'actualizar'])->name('lotes.actualizar');
    Route::post('/lotes/eliminar/{id}', [LoteController::class, 'eliminar'])->name('lotes.eliminar');
    Route::post('/lotes/guardar', [LoteController::class, 'guardar'])->name('lotes.guardar');


    Route::get('/dservicios/inicio/{id}', [detalleservicioController::class, 'inicio'])->name('detalleservicio.inicio');
    Route::get('/dservicios/servicios/', [detalleservicioController::class, 'servicios'])->name('detalleservicio.servicios');
    Route::post('/dservicios/guardar', [detalleservicioController::class, 'guardar'])->name('detalleservicio.guardar');
    Route::get('/dservicios/acciones/{id}', [detalleservicioController::class, 'acciones'])->name('detalleservicio.acciones');
    Route::get('/dservicios/editar/{id}', [detalleservicioController::class, 'editar'])->name('detalleservicio.editar');
    Route::post('/dservicios/actualizar/{id}', [detalleservicioController::class, 'actualizar'])->name('detalleservicio.actualizar');
    Route::post('/dservicios/eliminar/{id}', [detalleservicioController::class, 'eliminar'])->name('detalleservicio.eliminar');

    Route::get('/categoria/inicio', [CategoriaController::class, 'inicio'])->name('categorias.inicio');
    Route::get('/categoria/crear/', [CategoriaController::class, 'crear'])->name('categorias.crear');
    Route::post('/categoria/guardar/', [CategoriaController::class, 'guardar'])->name('categorias.guardar');
    Route::get('/categoria/editar/{id}', [CategoriaController::class, 'editar'])->name('categorias.editar');
    Route::post('/categoria/actualizar/{id}', [CategoriaController::class, 'actualizar'])->name('categorias.actualizar');
    Route::post('/categoria/eliminar/{id}', [CategoriaController::class, 'eliminar'])->name('categorias.eliminar');

    Route::get('/marcas/inicio', [MarcaController::class, 'inicio'])->name('marcas.inicio');
    Route::get('/marcas/crear', [MarcaController::class, 'crear'])->name('marcas.crear');
    Route::post('/marcas/guardar', [MarcaController::class, 'guardar'])->name('marcas.guardar');
    Route::get('/marcas/editar/{id}', [MarcaController::class, 'editar'])->name('marcas.editar');
    Route::post('/marcas/actualizar/{id}', [MarcaController::class, 'actualizar'])->name('marcas.actualizar');
    Route::post('/marcas/eliminar/{id}', [MarcaController::class, 'eliminar'])->name('marcas.eliminar');
    
    Route::get('/correo/enviar', [CorreoController::class, 'enviar'])->name('correo.enviar');
});
