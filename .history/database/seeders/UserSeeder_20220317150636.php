<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'wilbure',
            'state' => 'SP',
            'cnpj' => '12345678901234',
            'city' => 'Bauru',
            'email' => 'ge@wilbur.com',
            'password' => '123',
            'typeable_id' => 1,
            'typeable_type' => '\App\Models\Company'
        ]);

        DB::table('users')->insert([
            'name' => 'wilbure',
            'state' => 'SP',
            'cnpj' => '12345678901234',
            'city' => 'Bauru',
            'email' => 'ge@wilbur.com',
            'password' => '123',
            'typeable_id' => 1,
            'typeable_type' => '\App\Models\Colaborator'
        ]);

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
}
