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

        $colaborator = new Colaborator;
        $colaborator->company_id = Auth::user()->id;
        $user->typeable_id = $colaborator->id;
    }

    public function colaborator(){
        if(Auth::user()->name == null){
            return redirect('/fill-info');
        }else{
            return view('colaborator_profile');
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
        $colaborator->birth_date = $request->birthDate;
        $colaborator->phone_number = $request->phoneNumber;
        $colaborator->save();

        Auth::user()->name = $request->name;
        Auth::user()->save();
    }
}
