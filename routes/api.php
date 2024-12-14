<?php

use App\Http\Api\Controllers\AuthController;
use App\Http\Api\Controllers\UserController;
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

Route::prefix('user')->group(function () {
    Route::post('create', [UserController::class, 'store']);
    Route::get('all', [UserController::class, 'index']);
    Route::get('show/{id}', [UserController::class, 'show']);
    Route::put('update/{id}', [UserController::class, 'update']);
    Route::post('login', [AuthController::class, 'login']);
    Route::delete('destroy/{id}', [UserController::class, 'destroy']);
});
