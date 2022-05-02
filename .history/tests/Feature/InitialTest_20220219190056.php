<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Company;
use Illuminate\Support\Facades\Artisan;

class InitialTest extends TestCase
{
    public static function setUp(){
        Artisan::call("migrate:fresh");
    }

    public function test__home_page_is_accessible()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test__register_company_page_is_accessible()
    {
        $response = $this->get('/register-company');

        $response->assertStatus(200);
    }

    public function test__companies_can_be_registered()
    {
        $this->assertEquals(0, Company::all()->count());

        $this->post('/register-company', [
            'name' => 'wilbur',
            'state' => 'SP',
            'cnpj' => '12345678901234',
            'city' => 'Bauru',
            'email' => 'geha@wilbur.com',
            'password' => 'ahjsdhjad'
        ]);

        $this->assertEquals(1, Company::all()->count());
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
}
