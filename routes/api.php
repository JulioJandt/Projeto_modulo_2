<?php


use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    // rotas privadas
});

// rota pública
use App\Http\Controllers\UserController;

Route::post('users', [UserController::class, 'store']);

