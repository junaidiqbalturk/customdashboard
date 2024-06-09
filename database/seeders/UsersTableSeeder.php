<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            //admin
        [
            'name' => 'testadmin',
            'uname' => 'testadmin',
            'email' => 'test@example.com',
            'country' => 'Pakistan',
            'companyname' => 'TX Digitizing',
            'caddress' =>   'Karachi, Pakistan',
            'phonenumber' =>    '03122978038',
            'password'=> Hash::make('greamesmith'),
            'role'=>'admin'
        ],
            //user
            [
                'name' => 'testuser',
                'uname' => 'testuser',
                'email' => 'testuser@example.com',
                'country' => 'Pakistan',
                'companyname' => 'TX Digitizing',
                'caddress' =>   'Karachi, Pakistan',
                'phonenumber' =>    '03122978038',
                'password'=> Hash::make('greamesmith'),
                'role'=>'user'
            ], 
        ]);
        $this->call(UsersTableSeeder::class);
    }
}
