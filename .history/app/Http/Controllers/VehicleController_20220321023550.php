<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\Plate;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{
    public function create(){
        return view('add_vehicle', [
            'page' => 'add_vehicles',
            'userType' => 'colaborator'
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'max:255'],
            'brand' => ['required', 'max:255'],
            'plate' => ['required', 'max:255', new Plate, 'unique:vehicles'],
            'color' => ['required', 'max:255'],
        ]);

        $vehicle = new Vehicle;
        $vehicle->owner_id = Auth::user()->id;
        $vehicle->company_id = Auth::user()->company_id;
        $vehicle->name = $request->name;
        $vehicle->brand = $request->brand;
        $vehicle->plate = $request->plate;
        $vehicle->color = $request->color;
        $vehicle->save();
    }

    public function index(Request $request){
        $user = Auth::user();
        $userType = $user->typeable_type === '\App\Models\Company' ? 'company' : 'colaborator';
        Vehic
        return view('vehicles', [ 
            'vehicles' => $userType == 'company' ? $user->vehicles : $user->company->vehicles,
            'user' => $user,
            'page' => 'vehicles',
            'userType' => $userType,
        ]);
    }
}
