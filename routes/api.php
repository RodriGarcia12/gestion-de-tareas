<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function () {
    Route::post('/task',[TaskController::class,'Create']);
    Route::get('/task',[TaskController::class,'Read']);
    Route::get('/task/{d}',[TaskController::class,'Find']);
    Route::put('/task/{d}',[TaskController::class,'Update']);
    Route::delete('/task/{d}',[TaskController::class,'Delete']);
});
