<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::middleware('jwt.auth')->group(function () {
    Route::middleware('jwt.auth')->get('/dashboard', [DashboardController::class, 'index']);

});

// rota pública
use App\Http\Controllers\UserController;

Route::post('users', [UserController::class, 'store']);

use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login']);

