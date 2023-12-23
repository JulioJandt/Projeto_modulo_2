<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExerciseController;

Route::middleware('jwt.auth')->group(function () {
    Route::middleware('jwt.auth')->get('/dashboard', [DashboardController::class, 'index']);
    Route::middleware('jwt.auth')->get('/exercises', [ExerciseController::class, 'index']);
    Route::middleware('jwt.auth')->post('/exercises', [ExerciseController::class, 'store']);

});

use App\Http\Controllers\UserController;

Route::post('users', [UserController::class, 'store']);

use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login']);

