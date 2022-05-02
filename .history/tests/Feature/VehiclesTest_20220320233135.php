<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ColaboratorsTest extends TestCase
{

    use RefreshDatabase;

    public function registerExampleCompany(){
        return $this->post('/register-company', [
            'name' => 'wilbure',
            'state' => 'SP',
            'cnpj' => '12345678901234',
            'city' => 'Bauru',
            'email' => 'ge@wilbur.com',
            'password' => 'ahjsdhjad'
        ]);
    }

    public function registerExampleColaborator(){
        $this->post('/register-colaborator', [
            'email' => 'geha@wilbur.com',
            'password' => 'ahjsdhjad'
        ]);
        Auth::logout();
        $this->post('/login', [
            'email' => 'geha@wilbur.com',
            'password' => 'ahjsdhjad'
        ]);
        $this->post('/fill-info', [
            'name' => 'wilbur',
            'cpf' => '12345678901',
            'birthDate' => '11/12/2000',
            'phoneNumber' => '(12) 99823-1423',
        ]);
    }

    public function registerExampleVehicle(){
        $this->post('/add-vehicle', [
            'name' => 'Little Car',
            'brand' => 'Carlouse',
            'plate' => 'LAL-1234',
            'color' => 'Blue'
        ]);
    }

    public function test__vehicles_can_be_registered()
    {
        $this->registerExampleCompany();

        $this->registerExampleColaborator();

        $this->registerExampleVehicle();

        $this->assertEquals('Blue', Vehicle::find(1)->color);
    }

    /**
     * @dataProvider addVehicleData
     */

    public function test__add_vehicle_form_has_several_validation_requirements($data, $errors, $notErrors)
    {
        $this->registerExampleCompany();

        $this->registerExampleColaborator();

        $response = $this->post('/add-vehicle', $data);

        if($errors ?? $errors.count()){
            $response->assertSessionHasErrors($errors);
        }
        if($notErrors ?? $notErrors){
            $response->assertSessionDoesntHaveErrors($notErrors);
        }
    }

    public function addVehicleData(){
        return [
            [
                ['name' => 'Little Car', 'brand' => 'Carlouse', 'plate' => 'LAL-1234','color' => 'Blue'],
                [],
                ['name', 'brand', 'plate', 'color']
            ],
            [
                ['name' => 'hello', 'brand' => 'Carlouse'],
                ['plate', 'color'],
                ['name', 'brand']
            ],
            [
                ['name' => str_repeat('a', 256), 'plate' => '111'],
                ['name', 'plate'],
                []
            ]
        ];
    }

    public function test__existent_colaborators_cant_be_registered_again()
    {
        $this->registerExampleCompany();
        $this->post('/register-colaborator', [
            'email' => 'geha@wilbur.com',
            'password' => 'ahjsdhjad'
        ]);
        $response = $this->post('/register-colaborator', [
            'email' => 'geha@wilbur.com',
            'password' => 'ahjsdhjad'
        ]);
        $response->assertSessionHasErrors(['email']);
    }

    public function test__existent_colaborators_can_login_anytime()
    {
        $this->registerExampleCompany();

        $this->post('/register-colaborator', [
            'email' => 'geha@wilbur.com',
            'password' => 'ahjsdhjad'
        ]);
        Auth::logout();
        $this->post('/login', [
            'email' => 'geha@wilbur.com',
            'password' => 'ahjsdhjad'
        ]);
 
        $this->assertEquals('geha@wilbur.com', Auth::user()->email);
    }

    public function test__nonexistent_colaborators_cant_login()
    {
        $this->post('/login', [
            'email' => 'geha@wilbur.com',
            'password' => 'ahjsdhjad'
        ]);
 
        $this->assertEquals(null, Auth::user());
    } 
}
