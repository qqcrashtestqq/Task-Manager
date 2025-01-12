<?php

use App\Http\Api\Controllers\AuthController;
use App\Http\Api\Controllers\CommentController;
use App\Http\Api\Controllers\RegisterController;
use App\Http\Api\Controllers\TaskController;
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

//Users route
Route::prefix('users')->group(function () {
    Route::post('create', [UserController::class, 'store']);
    Route::get('all', [UserController::class, 'index']);
    Route::get('show/{id}', [UserController::class, 'show']);
    Route::put('update/{id}', [UserController::class, 'update']);
    Route::post('login', [AuthController::class, 'login']);
    Route::delete('destroy/{id}', [UserController::class, 'destroy']);
});


//Tasks route
Route::prefix('tasks')->middleware('auth:api')->group(function () {
    Route::get('all', [TaskController::class, 'index']);
    Route::get('show/{id}', [TaskController::class, 'show']);
    Route::post('create', [TaskController::class, 'store']);
    Route::put('update/{id}', [TaskController::class, 'update']);
    Route::delete('destroy/{id}', [TaskController::class, 'destroy']);
    Route::get('search', [TaskController::class, 'searchTask']);
});

//Register and Login for user
Route::post('register', [RegisterController::class, 'registerUser']);
Route::post('login', [AuthController::class, 'login']);


//Comments route
Route::prefix('comments')->middleware('auth:api')->group(function(){
    Route::get('all', [CommentController::class, 'index']);
    Route::get('show/{id}', [CommentController::class, 'show']);
    Route::post('create', [CommentController::class, 'store']);
    Route::post('update/{id}', [CommentController::class, 'update']);
    Route::delete('destroy/{id}', [CommentController::class, 'destroy']);
});
