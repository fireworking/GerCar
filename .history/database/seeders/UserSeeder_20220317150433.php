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
            'password' => 'ahjsdhjad'
        ]);

        $this->post('/register-company', [
            'name' => 'wilbure',
            'state' => 'SP',
            'cnpj' => '12345678901234',
            'city' => 'Bauru',
            'email' => 'ge@wilbur.com',
            'password' => 'ahjsdhjad'
        ]);
        $user->typeable_id = $company->id;
        $user->typeable_type = '\App\Models\Company';
    }
}
