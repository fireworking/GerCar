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

    ,
            [
                ['cnpj' => '00623111', 'state' => 'S', 'email' => 'neno'],
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
