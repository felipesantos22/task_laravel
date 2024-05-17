<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::post('/v1/task', [TaskController::class, 'store']);
Route::get('/v1/task', [TaskController::class, 'index']);
Route::get('/v1/task/{id}', [TaskController::class, 'show']);
Route::put('/v1/task/{id}', [TaskController::class, 'update']);
Route::delete('/v1/task/{id}', [TaskController::class, 'destroy']);

Route::post('/v1/user', [UserController::class, 'store']);
Route::get('/v1/user', [UserController::class, 'index']);

//Auth
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});
