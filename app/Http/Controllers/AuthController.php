<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class AuthController extends Controller
{
 
    public function register(Request $request)
    {
 
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);


        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']), 
            'role' => 'peserta',
        ]);

        $token = $user->createToken('mobile-token')->plainTextToken;

        return response()->json([
            'message' => 'Registrasi berhasil dengan integritas data terjaga.',
            'user' => $user,
            'token' => $token,
        ], 201);
    }

   
    public function login(Request $request)
    {
   
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

    
        $user = User::where('email', $credentials['email'])->first();

             if (!$user || !Hash::check($credentials['password'], $user->password)) {
                  throw ValidationException::withMessages([
                'email' => ['Email atau password tidak cocok.'],
            ]);
        }

        $user->tokens()->delete();


        $token = $user->createToken('mobile-token')->plainTextToken;

        return response()->json([
            'message' => 'Login berhasil dan hash password tervalidasi.',
            'user' => $user,
            'token' => $token,
        ]);
    }
    public function user(Request $request)
    {
        return response()->json(['user' => $request->user()]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logout berhasil, token dihapus.']);
    }
}
