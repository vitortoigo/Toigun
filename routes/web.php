<?php

use App\Http\Controllers\PageServicoController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\QuemEuDevoController;
use App\Http\Controllers\QuemMeDeveController;
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

Route::get('/', [PrincipalController::class, 'index'])->name('home');

Route::get('/servicos', [PageServicoController::class, 'index'])->name('servicos');

Route::get('/novo-servico', [ServicoController::class, 'index'])->name('novo-servico')->middleware('auth');
Route::post('/novo-servico/enviar', [ServicoController::class, 'store'])->name('novo-servico.enviar')->middleware('auth');
Route::post('/servico/concluido-{id}', [ServicoController::class, 'concluded'])->name('servico.concluido')->middleware('auth');
Route::delete('/servico/deletar-{id}', [ServicoController::class, 'delete'])->name('servico.delete')->middleware('auth');

Route::get('/quem-eu-devo', [QuemEuDevoController::class, 'index'])->name('quem-eu-devo');
Route::post('/quem-eu-devo/novo', [QuemEuDevoController::class, 'store'])->name('quem-eu-devo.novo')->middleware('auth');
Route::delete('/quem-eu-devo/concluido-{id}', [QuemEuDevoController::class, 'delete'])->name('quem-eu-devo.concluido')->middleware('auth');

Route::get('/quem-me-deve', [QuemMeDeveController::class, 'index'])->name('quem-me-deve');
Route::post('/quem-me-deve/novo', [QuemMeDeveController::class, 'store'])->name('quem-me-deve.novo')->middleware('auth');
Route::delete('/quem-me-deve/concluido-{id}', [QuemMeDeveController::class, 'delete'])->name('quem-me-deve.concluido')->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});