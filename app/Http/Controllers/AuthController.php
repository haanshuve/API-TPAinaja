<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // 🔒 Register hanya bisa dilakukan oleh admin
    public function register(Request $request)
    {
        $currentUser = $request->user();

        // Pastikan yang akses adalah admin
        if (!$currentUser || $currentUser->role !== 'admin') {
            return response()->json([
                'message' => 'Hanya admin yang dapat membuat akun baru.'
            ], 403);
        }

        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|string|in:staff,admin', // optional: biar admin bisa buat role lain
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'role' => $fields['role'],
        ]);

        return response()->json([
            'message' => 'Akun baru berhasil dibuat oleh admin.',
            'user' => $user,
        ], 201);
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $fields['email'])->first();

        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response(['message' => 'Login gagal!'], 401);
        }

        $token = $user->createToken('mobile-token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ], 200);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return ['message' => 'Logout berhasil'];
    }

    // 🟩 Dashboard utama
    public function dashboard()
    {
        return view('dashboard');
    }

    public function exam()
    {
        return view('exam.index');
    }
}
