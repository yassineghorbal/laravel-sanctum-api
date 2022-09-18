<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => Hash::make($fields['password']),
        ]);

        $token = $user->createToken('authToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response($response, 201);
    }

    public function logout(Request $request)
    {
        $user = auth()->user();
        // $user->token()->delete();

        return response([
            'message' => 'Successfully logged out',
        ], 200);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);

        //check email
        $user = User::where('email', $credentials['email'])->first();

        //check password
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return response([
                'message' => 'Invalid credentials',
            ], 401);
        }

        $token = $user->createToken('authToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response($response, 200);
    }
}
