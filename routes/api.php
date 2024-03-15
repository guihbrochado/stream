<?php

use App\Http\Controllers\api\CalendarController;
use App\Http\Controllers\api\CopyClientPositionController;
use App\Http\Controllers\api\CopySenderPositionController;
use App\Http\Controllers\api\DealsHistoryController;
use App\Http\Controllers\apps\DashboardController;
use App\Http\Controllers\apps\DealController;
use App\Http\Controllers\api\LicenseController;
use App\Http\Controllers\api\OrderErrorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');
Route::post('/calendar/store', [CalendarController::class, 'store'])->name('calendar.store');
Route::patch('/calendar/{id}', [CalendarController::class, 'update'])->name('calendar.update');
Route::delete('/calendar/{id}', [CalendarController::class, 'destroy'])->name('calendar.destroy');

Route::get('/copy_sender', [CopySenderPositionController::class, 'index'])->name('copy_sender.index');
Route::get('/copy_client', [CopyClientPositionController::class, 'index'])->name('copy_client.index');
Route::post('/dashboard/filtros', [DashboardController::class, 'filtros'])->name('dashboard.filtros');

// ROTAS PARA USO NO MT5
Route::post('/licenca/validar', [LicenseController::class, 'validar'])->name('licenca.validar');
Route::post('/licenca/validar/2', [LicenseController::class, 'validar2'])->name('licenca.validar2');
Route::post('/licenca/validar/3', [LicenseController::class, 'validar3'])->name('licenca.validar3');
Route::post('/licenca/copy_client', [LicenseController::class, 'copy_client'])->name('licenca.copy_client');
Route::post('/licenca/copy_master', [LicenseController::class, 'copy_master'])->name('licenca.copy_master');
Route::post('/licenca/ea', [LicenseController::class, 'ea'])->name('licenca.ea');
//Route::post('/sinaltridar/sinal', [SinalTridarController::class, 'sinal'])->name('sinaltridar.sinal');

Route::post('/deals_history/history', [DealsHistoryController::class, 'history'])->name('deals_history.history');
Route::post('/order_error/store', [OrderErrorController::class, 'store'])->name('order_error.store');