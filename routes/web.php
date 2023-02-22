<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\CuotaController;
use App\Http\Controllers\OperarioController;
use App\Http\Controllers\RegistrarTareaController;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Empleado;


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
    'operario' => OperarioController::class,
    'registrarTarea' => RegistrarTareaController::class,
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
Route::get('cuotas/monthly_create', [CuotaController::class, 'monthly_create'])->name('cuota.monthly_create');
Route::post('cuotas/monthly_store', [CuotaController::class, 'monthly_store'])->name('cuota.monthly_store');

Route::get('operarios/pendiente',[OperarioController::class, 'pendiente'])->name('operario.pendiente');

//GITHUB

Route::get('/auth/github/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/github/callback', function () {
    $githubUser = Socialite::driver('github')->user();
 
    $user = Empleado::firstOrCreate([
        'github_id' => $githubUser->id,
    ], [
        'nombre' => $githubUser->name,
        'email' => $githubUser->email,
        'tipo' => 'Operario'
    ]);
 
    Auth::login($user);
 
    return redirect('/');
});

//GOOGLE

Route::get('/auth/google/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/auth/google/callback', function () {
    $googleUser = Socialite::driver('google')->user();
 
    $user = Empleado::firstOrCreate([
        'google_id' => $googleUser->id,
    ], [
        'nombre' => $googleUser->name,
        'email' => $googleUser->email,
        'tipo' => 'Administrador'
    ]);
 
    Auth::login($user);
 
    return redirect('/');
});

//PDF

Route::get('cuota/{id}/pdf', [CuotaController::class, 'pdf'])->name('cuota.pdf');





