<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'email' => 'ge@wilbur.com',
            'password' => '123',
            'typeable_id' => 1,
            'typeable_type' => '\App\Models\Company'
        ]);

        DB::table('companies')->insert([
            'state' => 'SP',
            'cnpj' => '12345678901234',
            'city' => 'Bauru',
        ]);

        DB::table('users')->insert([
            'name' => 'wilbur',
            'email' => 'ge@wilbur.com',
            'password' => '123',
            'typeable_id' => 1,
            'typeable_type' => '\App\Models\Colaborator'
        ]);

        DB::table('colaborators')->insert([
            'cpf' => '12345678901',
            'birthDate' => '11/12/2000',
            'phoneNumber' => '(12) 99823-1423',
        ]);

        DB::table('vehicles')->insert([
            'name' => 'Little Car',
            'brand' => 'Carlouse',
            'plate' => 'LAL-1212',
            'color' => 'Blue',
            'owner_id' => 1,
            'company_id' => 1,
        ]);
    }
}
