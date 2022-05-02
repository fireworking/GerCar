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
        dd()
        if(Auth::user()->name == null){
            redirect('/fill-info');
        }
    }

    public function fillInfo(){
        return view('/fill_info');
    }
}
