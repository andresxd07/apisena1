<?php

namespace App\Http\Controllers;

use App\Models\User; // Agrega esta línea para importar el modelo User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Método para el registro de usuarios
    public function register(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'username' => 'required|unique:usuarios',
            'password' => 'required|min:6',
        ]);

        // Crear un nuevo usuario
        $user = new User();
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json(['message' => 'Registro exitoso'], 201);
    }

    // Método para el inicio de sesión
    public function login(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return response()->json(['message' => 'Inicio de sesión exitoso'], 200);
        }

        return response()->json(['message' => 'Error en la autenticación'], 401);
    }
}
