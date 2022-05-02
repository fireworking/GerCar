<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use App\Rules\Cnpj;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{

    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'max:255', 'unique:users'],
            'state' => ['required'],
            'cnpj' => ['required', new Cnpj, 'unique:companies'],
            'city' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'max:255'],
        ]);

        $company = new Company;
        $company->state = $request->state;
        $company->cnpj = $request->cnpj;
        $company->city = $request->city;
        $company->save();

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->typeable_id = $company->id;
        $user->typeable_type = '\App\Models\Company';
        $user->save();
        
        foreach($user->typeable->toArray() as $key => $value){
            $user->setAttribute($key, $value);
        }

        Auth::login($user);
    }

    public function loginForm(){
        return view('login_company');
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
