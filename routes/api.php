<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Middleware\Auth;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::post('/task',[TaskController::class,'Create'])->middleware(Auth::class);
    Route::get('/task',[TaskController::class,'Read'])->middleware(Auth::class);
    Route::get('/task/{d}',[TaskController::class,'Find']);
    Route::put('/task/{d}',[TaskController::class,'Update']);
    Route::delete('/task/{d}',[TaskController::class,'Delete']);
});
