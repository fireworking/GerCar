<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class  extends TestCase
{

    use RefreshDatabase;

    public function registerExampleCompany(){
        return $this->post('/register-company', [
            'name' => 'wilbur',
            'state' => 'SP',
            'cnpj' => '12345678901234',
            'city' => 'Bauru',
            'email' => 'geha@wilbur.com',
            'password' => 'ahjsdhjad'
        ]);
    }

    public function test__companies_can_be_registered()
    {
        $this->registerExampleCompany();

        $this->assertEquals('12345678901234', Auth::user()->cnpj);
    }

    /**
     * @dataProvider companyData
     */

    public function test__register_company_form_has_several_validation_requirements($data, $errors, $notErrors)
    {
        $response = $this->post('/register-company', $data);

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
                ['name' => 'h', 'city' => 'l', 'cnpj' => '00623904000173', 'email' => 'h@j', 'password' => 'u', 
                    'state' => 'SP', 'city' => 'k'],
                [],
                ['name', 'city', 'state', 'cnpj', 'email', 'password']
            ],
            [
                ['name' => 'hello', 'city' => 'llamatown'],
                ['state', 'cnpj', 'email', 'password'],
                ['name', 'city']
            ],
            [
                ['cnpj' => '00623111', 'email' => 'neno'],
                ['cnpj', 'state', 'email'],
                []
            ],
            [
                ['name' => str_repeat('a', 256), 'city' => str_repeat('a', 256), 'password' => 'ohhey'],
                ['name', 'city'],
                ['password']
            ]
        ];
    }

    public function test__existent_companies_cant_be_registered_again()
    {
        $this->registerExampleCompany();
        Auth::logout();
        $response = $this->registerExampleCompany();
        $response->assertSessionHasErrors(['email', 'name', 'cnpj']);
    }

    public function test__companies_are_logged_in_when_registered()
    {
        $this->registerExampleCompany();

        $this->assertEquals('wilbur', Auth::user()->name);
    }

    public function test__companies_can_login_anytime()
    {
        $this->registerExampleCompany();
        
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

    public function test__nonexistent_companies_cant_login()
    {
        $this->post('/login', [
            'email' => 'geha@wilbur.com',
            'password' => 'ahjsdhjad'
        ]);
 
        $this->assertEquals(null, Auth::user());
    } 
}
