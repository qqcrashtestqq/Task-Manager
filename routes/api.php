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

//todo добавить префикс и группировать роуты
Route::post('createUser', [UserController::class, 'store']);
Route::get('allUser', [UserController::class, 'index']);
Route::put('updateUser/{id}', [UserController::class, 'update']);
Route::post('loginUser', [AuthController::class, 'login']);
