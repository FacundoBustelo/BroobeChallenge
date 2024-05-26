<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PageSpeedController;
use App\Http\Controllers\Metric_history_runsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('/', [PageController::class, 'index']);

Route::get('/metric-history', [Metric_history_runsController::class, 'index']);

Route::get('/get-metrics', [PageSpeedController::class, 'getMetrics']);

Route::post('/save-metrics', [Metric_history_runsController::class, 'store'])->name('save-metrics');
