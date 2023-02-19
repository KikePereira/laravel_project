<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\CuotaController;
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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

Route::get('/', [HomeController::class, 'index']);

Route::resources([
    'tarea' => TareaController::class,
    'empleado' => EmpleadoController::class,
    'cliente' => ClienteController::class,
    'cuota' => CuotaController::class,
]);

Route::get('/eliminada', [TareaController::class, 'eliminadas'])->name('tarea.eliminada');
Route::post('/eliminada/{id}',[TareaController::class, 'restore'])->name('tarea.restore');
Route::get('/pendiente',[TareaController::class, 'pendiente'])->name('tarea.pendiente');

Route::get('empleados/eliminado', [EmpleadoController::class, 'eliminado'])->name('empleado.eliminado');
Route::post('empleados/eliminado/{id}',[EmpleadoController::class, 'restore'])->name('empleado.restore');

Route::get('clientes/eliminado', [ClienteController::class, 'eliminado'])->name('cliente.eliminado');
Route::post('clientes/eliminado/{id}',[ClienteController::class, 'restore'])->name('cliente.restore');

Route::get('cuotas/eliminado', [CuotaController::class, 'eliminado'])->name('cuota.eliminado');
Route::post('cuotas/eliminado/{id}',[CuotaController::class, 'restore'])->name('cuota.restore');