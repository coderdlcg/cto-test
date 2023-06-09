<?php

use App\Http\Controllers\API\V1\WorkTimeController;
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

Route::middleware('auth:sanctum')->prefix('worktimes')->group(function () {
    Route::post('/start', [WorkTimeController::class, 'start'])->name('start');
    Route::post('/stop', [WorkTimeController::class, 'stop'])->name('stop');
});
