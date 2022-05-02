<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $user->typeable_type = '\App\Models\Company';
        $user->save();
        
        Auth::login($user);
    }

    public function company(){
        return redirect('vehicle');
    }
}
