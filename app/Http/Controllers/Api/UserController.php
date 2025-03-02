<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Listado de usuarios',
        ]);
    }

    public function store()
    {
        return response()->json([
            'message' => 'Crear usuario',
        ]);
    }

    public function show($user)
    {
        return response()->json([
            'message' => 'Recuperar usuario con id ' . $user,
        ]);
    }

    public function update($user)
    {
        return response()->json([
            'message' => 'Actualizar usuario con id ' . $user,
        ]);
    }

    public function destroy($user)
    {
        return response()->json([
            'message' => 'Eliminar usuario con id ' . $user,
        ]);
    }
}
