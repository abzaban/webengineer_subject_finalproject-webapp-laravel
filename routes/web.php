<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::post('/validarInicioSesion', 'App\Http\Controllers\InicioSesionController@autenticarUsuario');

Route::get('/cerrarSesion', 'App\Http\Controllers\InicioSesionController@cerrarSesion');

Route::get('/empleados/especialista/inicio', 'App\Http\Controllers\EspecialistaController@mostrarPantallaPrincipal')->middleware('auth');

Route::get('/empleados/especialista/predios/registrarPredio', 'App\Http\Controllers\PrediosController@iniciarRegistro')->middleware('auth');

Route::post('/empleados/especialista/predios/registrar', 'App\Http\Controllers\PrediosController@guardarPredio')->middleware('auth');

Route::post('/empleados/especialista/predios/agregarCoordenada', 'App\Http\Controllers\PrediosController@agregarCoordenada')->middleware('auth');

Route::get('/empleados/especialista/predios/verPredios', 'App\Http\Controllers\AsignacionesController@mostrarPredios')->middleware('auth');

Route::get('/empleados/especialista/palmeras/verPalmeras', 'App\Http\Controllers\AsignacionesController@mostrarPalmeras')->middleware('auth');

Route::get('/empleados/especialista/asignaciones/{predio}', 'App\Http\Controllers\AsignacionesController@iniciarAsignacion')->middleware('auth');

Route::get('/empleados/especialista/asignaciones/{palmera}', 'App\Http\Controllers\AsignacionesController@iniciarAsignacion')->middleware('auth');

Route::post('/empleados/especialista/asignaciones/asignar', 'App\Http\Controllers\AsignacionesController@agendarActividades')->middleware('auth');

Route::get('/', 'App\Http\Controllers\ClienteController@iniciarCompra');

Route::get('/productos/{producto}', 'App\Http\Controllers\ClienteController@verDetalleProducto');

Route::post('/ventas/añadirArticuloCarrito', 'App\Http\Controllers\VentasController@realizarPedido')->middleware('auth');

Route::get('/ventas/verCarrito', 'App\Http\Controllers\VentasController@verCarrito')->middleware('auth');

Route::delete('/ventas/eliminarArticulo/{variedad}', 'App\Http\Controllers\VentasController@quitarArticuloCarrito')->middleware('auth');

Route::get('/ventas/pagarCarrito', 'App\Http\Controllers\VentasController@capturaDatosPago')->middleware('auth');

Route::post('/ventas/carrito/pagar', 'App\Http\Controllers\VentasController@pagarCarrito')->middleware('auth');
