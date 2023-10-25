<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;

// Rutas para el controlador RolesController
Route::get('/roles', [RolesController::class, 'index']);  // Obtener todos los roles
Route::get('/roles/{id}', [RolesController::class, 'show']);  // Obtener un rol por ID
Route::post('/roles', [RolesController::class, 'store']);  // Crear un nuevo rol
Route::put('/roles/{id}', [RolesController::class, 'update']);  // Actualizar un rol por ID

// Rutas para el controlador UsersController
Route::get('/users', [UsersController::class, 'index']);  // Obtener todos los usuarios (incluyendo conductores)
Route::get('/users/{id}', [UsersController::class, 'show']);  // Obtener un usuario por ID
Route::post('/users', [UsersController::class, 'store']);  // Crear un nuevo usuario (incluyendo conductores)
Route::put('/users/{id}', [UsersController::class, 'update']);  // Actualizar un usuario por ID
Route::delete('/users/{id}', [UsersController::class, 'destroy']);  // Eliminar un usuario por ID

Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:api')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    // Otras rutas protegidas que requieren autenticación
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
