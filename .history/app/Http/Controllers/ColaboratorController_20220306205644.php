<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\Cpf;
use App\Rules\Date;
use App\Rules\PhoneNumber;
use App\Models\User;
use App\Models\Colaborator;
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
            return redirect('/fill-info');
        }else{
            return view('colaborator_page');
        }
    }

    public function fillInfoForm(){
        return view('/fill_info');
    }

    public function fillInfo(Request $request){
        $request->validate([
            'name' => ['required', 'max:255', 'unique:users'],
            'cpf' => ['required', new Cpf, 'unique:colaborators'],
            'birthDate' => ['required', new Date],
            'phoneNumber' => ['required', new PhoneNumber, 'unique:colaborators,phone_number'],
        ]);

        $colaborator = new Colaborator;
        $colaborator->cpf = $request->cpf;
        $colaborator->birth_date = $request->birthdate;
        $colaborator->phone_number = $request->phone_number;
        $colaborator->save();

        Auth::user()->name = $request->name;
        Auth::user()->typeable_id = $colaborator->id;
        Auth::user()->save();
        
        foreach(Auth::user()->typeable->toArray() as $key => $value){
            Auth::user()->setAttribute($key, $value);
        }
    }
}
