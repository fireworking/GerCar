<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterCompanyRequest;
use App\Models\Company;
use App\Models\User;
use App\Rules\Cnpj;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function create(){
        return view('register_company');
    }

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
        $user->typeable_type = 'Company';
        $user->save();

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

    public function mine(){
        return view('/company_profile', [ 'user' => Auth::user() ]);
    }

    public function show(User $user){
        return view('/company_profile', [$user->with('typeable')]);
    }
}
