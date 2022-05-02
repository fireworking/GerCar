<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InitialTest extends TestCase
{
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

    public function test__companies_can_be_registered(){
        $this->post('/register-company', [
            'name' => 'wilbur',
            'state' => 'SP',
            'cnpj' => '1234567890123',
            'city' => 'Bauru',
            'email'
        ]);
    }
}
