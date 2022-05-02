<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Rules\Cnpj;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function loginForm(){
        return view('login_form');
    }

    public function login(Request $request){
        $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'max:255'],
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $request->session()->regenerate();
            return;
        }

        return response()->json([
            'email' => ['The provided credentials do not match any account']
        ], 422);
    }

    public function logout(){
        Auth::logout();
        return redirect('/login-company');
    }
}
