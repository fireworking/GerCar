<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterCompanyRequest;
use App\Models\Company;

class CompanyController extends Controller
{
    public function create(){
        return view('register_company');
    }

    public function store(Request $request){


        $company = new Company;
        $company->name = $request->name;
        $company->state = $request->state;
        $company->cnpj = $request->cnpj;
        $company->city = $request->city;
        $company->email = $request->email;
        $company->password = bcrypt($request->password);
        $company->save();
    }
}
