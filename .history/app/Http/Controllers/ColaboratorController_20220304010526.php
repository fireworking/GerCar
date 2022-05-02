<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\Cpf;
use App\Rules\Date;
use App\Models\User;

class ColaboratorController extends Controller
{
    public function create(){
        return view('register_colaborator');
    }
    public function store(){
        $request->validate([
            'name' => ['required', 'max:255', 'unique:users'],
            'cpf' => ['required', new Cpf, 'unique:colaborators'],
            'birth_date' => ['required', new Date],
            'phone' => ['required', new PhoneNumber],
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
}
