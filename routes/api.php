<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
        'message' => 'Hola desde la API de Laravel',
    ]);
});

//Listar registros
Route::get('users', function(){
    return response()->json([
        'message' => 'Listado de usuarios',
    ]);
});

//Crear registros
Route::post('users', function(){
    return response()->json([
        'message' => 'Crear usuario',
    ]);
});

//Recuperar registros
Route::get('users/{id}', function($id){
    return response()->json([
        'message' => 'Recuperar usuario con id ' . $id,
    ]);
});

//Actualizar registros
Route::put('users/{id}', function($id){
    return response()->json([
        'message' => 'Actualizar usuario con id ' . $id,
    ]);
});

//Eliminar registros
Route::delete('users/{id}', function($id){
    return response()->json([
        'message' => 'Eliminar usuario con id ' . $id,
    ]);
});