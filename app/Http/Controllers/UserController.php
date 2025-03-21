<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

use const App\Paginations\UsersPerPage;

class UserController
{

    public function registerUser(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:users',
            'phone'      => 'required|string|min:8|max:15',
            // Si no es admin, se requiere confirmación de password
            'password'   => $request->is_admin ? 'required|string|min:8' : 'required|string|min:8|confirmed',
        ]);

        // Hashea la contraseña
        $validated['password'] = Hash::make($validated['password']);

        // Crear el usuario
        $user = User::create($validated);

        // Si el usuario no es admin, iniciar sesión y generar token
        if (!$request->is_admin) {
            Auth::login($user);
            $token = $user->createToken('token')->accessToken;

            return response()->json([
                'message' => 'Usuario registrado y autenticado con éxito',
                'user'    => $user,
                'token'   => $token,
            ], 201);
        }

        return response()->json(['message' => 'Usuario registrado con éxito'], 201);
    }

    public function adminLogin(Request $request){
        
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->id !== 1) {
                Auth::logout();
                return response()->json(['message' => 'Unauthorized, only admin access.'], 403);
            }
        }

        error_log('User not found');
        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Invalid Credentials'], 401);
        }

        $user = Auth::user();
        $token = $request->user()->createToken('token')->accessToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
    }

    public function getUsers()
    {
        // Define the number of users per page
        $perPage = 20; // You can change this value as needed

        // Paginate the users
        $users = User::paginate($perPage);

        Log::alert('Users retrieved successfully');
        Log::alert($users);
        // Return the paginated users as a JSON response
        return response()->json($users);
    }
}
