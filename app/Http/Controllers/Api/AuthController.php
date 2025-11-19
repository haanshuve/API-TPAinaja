<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
{
    $request->validate([
        "email" => "required|email",
        "password" => "required"
    ]);
 /*      return response()->json([
        'received' => $request->all()
    ]); */

    $user = User::where("email", $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json([
            "message" => "Invalid credentials"
        ], 401);
    }

    $token = $user->createToken("auth_token")->plainTextToken;

    return response()->json([
        "message" => "Login success",
        "token" => $token,
        "user" => $user
    ]);
}


    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out']);
    }

   public function User(Request $request)
    {
        return $request->User();
    }

    public function register(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|unique:users,email',
        'password' => 'required|min:6',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    return response()->json([
        'message' => 'User created successfully',
        'user' => $user
    ], 201);
}

}
