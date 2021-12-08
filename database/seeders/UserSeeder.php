<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->truncate();
        DB::table('users')->insert([
            'first_name' => 'User',
            'last_name' => '1',
            'email' => 'user1@email.com',
            'password' => Hash::make('user1'),
            'dob' => '1997-06-16',
            'gender' => 'Male',
            'annual_income' => '500000',
            'occupation' => 'Government job',
            'family_type' => 'Nuclear family',
            'manglik' => 'No',
        ]);
        DB::table('users')->insert([
            'first_name' => 'User',
            'last_name' => '2',
            'email' => 'user2@email.com',
            'password' => Hash::make('user2'),
            'dob' => '1998-06-16',
            'gender' => 'Male',
            'annual_income' => '600000',
            'occupation' => 'Business',
            'family_type' => 'Joint family',
            'manglik' => 'Yes',
        ]);
        DB::table('users')->insert([
            'first_name' => 'User',
            'last_name' => '3',
            'email' => 'user3@email.com',
            'password' => Hash::make('user3'),
            'dob' => '1995-06-16',
            'gender' => 'Male',
            'annual_income' => '700000',
            'occupation' => 'Private job',
            'family_type' => 'Nuclear family',
            'manglik' => 'No',
        ]);
        DB::table('users')->insert([
            'first_name' => 'User',
            'last_name' => '4',
            'email' => 'user4@email.com',
            'password' => Hash::make('user4'),
            'dob' => '1997-06-16',
            'gender' => 'Female',
            'annual_income' => '500000',
            'occupation' => 'Government job',
            'family_type' => 'Nuclear family',
            'manglik' => 'No',
        ]);
        DB::table('users')->insert([
            'first_name' => 'User',
            'last_name' => '5',
            'email' => 'user5@email.com',
            'password' => Hash::make('user5'),
            'dob' => '1998-06-16',
            'gender' => 'Female',
            'annual_income' => '600000',
            'occupation' => 'Business',
            'family_type' => 'Joint family',
            'manglik' => 'Yes',
        ]);
        DB::table('users')->insert([
            'first_name' => 'User',
            'last_name' => '6',
            'email' => 'user6@email.com',
            'password' => Hash::make('user6'),
            'dob' => '1995-06-16',
            'gender' => 'Female',
            'annual_income' => '700000',
            'occupation' => 'Private job',
            'family_type' => 'Nuclear family',
            'manglik' => 'No',
        ]);
    }
}
