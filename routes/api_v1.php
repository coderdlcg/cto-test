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

Route::prefix('worktimes')->group(function () {
    Route::post('/', [WorkTimeController::class, 'store'])->name('start');
    Route::put( '/', [WorkTimeController::class, 'update'])->name('stop');
});
