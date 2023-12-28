<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\StudentController;

Route::middleware('jwt.auth')->group(function () {
    Route::middleware('jwt.auth')->get('/dashboard', [DashboardController::class, 'index']);

    Route::middleware('jwt.auth')->get('/exercises', [ExerciseController::class, 'index']);
    Route::middleware('jwt.auth')->post('/exercises', [ExerciseController::class, 'store']);
    Route::delete('/exercises/{id}', [ExerciseController::class, 'destroy']);

    Route::middleware('jwt.auth')->post('/students', [StudentController::class, 'store']);
    Route::middleware('jwt.auth')->get('/students', [StudentController::class, 'index']);
    Route::middleware('jwt.auth')->delete('/students/{id}', [StudentController::class, 'destroy']);
    Route::middleware('jwt.auth')->put('/students/{id}', [StudentController::class, 'update']);
});

use App\Http\Controllers\UserController;

Route::post('users', [UserController::class, 'store']);

use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login']);

