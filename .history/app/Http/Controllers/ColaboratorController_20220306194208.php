<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\Cpf;
use App\Rules\Date;
use App\Rules\PhoneNumber;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ColaboratorController extends Controller
{
    public function create(){
        return view('register_colaborator');
    }

    public function store(Request $request){
        $request->validate([
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'max:255'],
        ]);

        $user = new User;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->typeable_type = '\App\Models\Colaborator';
        $user->save();
    }

    public function colaborator(){
        if(Auth::user()->name == null){
            return  redirect('/fill-info');
        }
    }

    public function fillInfoForm(){
        return view('/fill_info');
    }

    public function fillInfo(Request $request){
        $request->validate([
            'name' => ['required', 'max:255', 'unique:users'],
            'cpf' => ['required', new Cpf, 'unique:colaborators'],
            'birth-date' => ['required', new Date],
            'phone-number' => ['required', new PhoneNumber, 'unique:colaborators'],
        ]);

        $company = new Co;
        $company->state = $request->state;
        $company->cnpj = $request->cnpj;
        $company->city = $request->city;
        $company->save();
        
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
