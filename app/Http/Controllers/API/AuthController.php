<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'Registration Success'
        ], 200);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (!Auth::attempt($request->only('email','password'))){
            throw ValidationException::withMessages([
                'email' => ['Email tidak ditemukan'],
            ]);
        }

        $user = User::where('email', $request->email)->first();

        return response()->json([
            'message' => 'Login Successfull',
            'name' => $user->name,
            'acess_token' => $user->createToken('auth_token')->plainTextToken,
            'data' => Auth::user()
        ],);
    }
}
