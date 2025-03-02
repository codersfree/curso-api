<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'message' => 'Hola desde la API de Laravel',
    ]);
});

Route::get('users/cursos', function () {
    return response()->json([
        'message' => 'Listado de cursos',
    ]);
});

Route::apiResource('users', UserController::class);

/* Route::get('users', [UserController::class, 'index']);
Route::post('users', [UserController::class, 'store']);
Route::get('users/{id}', [UserController::class, 'show']);
Route::put('users/{id}', [UserController::class, 'update']);
Route::delete('users/{id}', [UserController::class, 'destroy']); */