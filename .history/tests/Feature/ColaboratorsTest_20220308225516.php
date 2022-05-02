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

    public function registerExampleColaborator(){
        return $this->post('/register-colaborator', [
            'name' => 'wilbur',
            'cpf' => '12345678901',
            'birthDate' => '11/12/2000',
            'phoneNumber' => '(12) 99823-1423',
            'email' => 'geha@wilbur.com',
            'password' => 'ahjsdhjad'
        ]);
    }

    public function test__colaborators_can_be_registered()
    {
        $this->registerExampleColaborator();

        $this->assertEquals('12345678901', Auth::user()->cpf);
    }

    /**
     * @dataProvider companyData
     */

    public function test__register_company_form_has_several_validation_requirements($data, $errors, $notErrors)
    {
        $response = $this->post('/register-colaborator', $data);

        if($errors ?? $errors.count()){
            $response->assertSessionHasErrors($errors);
        }
        if($notErrors ?? $notErrors){
            $response->assertSessionDoesntHaveErrors($notErrors);
        }
    }

    public function companyData(){
        return [
            [
                ['name' => 'h', 'birthDate' => '11/12/2021', 'cpf' => '00623904000', 'email' => 'h@j', 'password' => 'u', 
                    'phoneNumber' => '(12) 99823-1423'],
                [],
                ['name', 'birthDate', 'phoneNumber', 'cpf', 'email', 'password']
            ],
            [
                ['name' => 'hello', 'birthDate' => '10/12/2001'],
                ['phoneNumber', 'cpf', 'email', 'password'],
                ['name', 'birthDate']
            ],
            [
                ['cpf' => '006231', 'email' => 'neno', 'phoneNumber'],
                ['cpf', 'phoneNumber', 'email'],
                []
            ],
            [
                ['name' => str_repeat('a', 256), 'birthDate' => '111', 'password' => 'ohhey'],
                ['name', 'birthDate'],
                ['password']
            ]
        ];
    }

    public function test__existent_companies_cant_be_registered_again()
    {
        $this->registerExampleColaborator();
        Auth::logout();
        $response = $this->registerExampleColaborator();
        $response->assertSessionHasErrors(['email', 'name', 'cnpj']);
    }

    public function test__companies_are_logged_in_when_registered()
    {
        $this->registerExampleColaborator();

        $this->assertEquals('wilbur', Auth::user()->name);
    }

    public function test__companies_can_login_anytime()
    {
        $this->registerExampleColaborator();
        
        Auth::logout();

        $this->post('/login', [
            'email' => 'geha@wilbur.com',
            'password' => 'ahjsdhjad'
        ]);
 
        $this->assertEquals('wilbur', Auth::user()->name);
    }

    public function test__nonexistent_companies_cant_login()
    {
        $this->post('/login', [
            'email' => 'geha@wilbur.com',
            'password' => 'ahjsdhjad'
        ]);
 
        $this->assertEquals(null, Auth::user());
    } 
}
