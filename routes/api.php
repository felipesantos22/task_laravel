<?php

use App\Http\Controllers\TaskController;
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