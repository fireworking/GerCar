<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ColaboratorController extends Controller
{
    public function create(){
        return view('register_colaborator');
    }
    public function store(){
        return;
    }
}
