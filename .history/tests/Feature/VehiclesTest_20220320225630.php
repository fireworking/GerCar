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
            'name' => ''
        ]);
    }

    public function test__colaborators_can_be_registered()
    {
        $this->registerExampleCompany();

        $this->registerExampleColaborator();

        $this->assertEquals('12345678901', User::find(2)->cpf);
    }

    /**
     * @dataProvider fillInfoData
     */

    public function test__fill_info_form_has_several_validation_requirements($data, $errors, $notErrors)
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

        $response = $this->post('/fill-info', $data);

        if($errors ?? $errors.count()){
            $response->assertSessionHasErrors($errors);
        }
        if($notErrors ?? $notErrors){
            $response->assertSessionDoesntHaveErrors($notErrors);
        }
    }

    public function fillInfoData(){
        return [
            [
                ['name' => 'h', 'birthDate' => '11/12/2021', 'cpf' => '00623904000', 'phoneNumber' => '(12) 99823-1423'],
                [],
                ['name', 'birthDate', 'phoneNumber', 'cpf']
            ],
            [
                ['name' => 'hello', 'birthDate' => '10/12/2001'],
                ['phoneNumber', 'cpf'],
                ['name', 'birthDate']
            ],
            [
                ['cpf' => '006231', 'phoneNumber' => '231'],
                ['cpf', 'phoneNumber'],
                []
            ],
            [
                ['name' => str_repeat('a', 256), 'birthDate' => '111'],
                ['name', 'birthDate'],
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
