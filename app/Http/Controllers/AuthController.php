<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }
    public function login()
    {
        return view('auth.login');
    }
    public function postlogin(Request $request)
    {
        if (Auth::attempt($request->only('email','password'))) {
            return redirect('dashboard');
        }
        return redirect('/login');
    }

    public function register(){
        return view('register');
    }
//tambahan lai
    public function registeruser(Request $request){
        User::create([
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);

        return redirect('/login');
    }
//tambahan lai
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
