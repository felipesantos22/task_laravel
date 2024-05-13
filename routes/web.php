<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('login');
// });

Route::get('/', [UserController::class, 'login'])->name('login');
Route::post('/auth', [UserController::class, 'auth'])->name('auth');
Route::get('/home', [UserController::class, 'home'])->name('home');