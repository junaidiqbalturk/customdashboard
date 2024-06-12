<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
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
            'name' => 'tx.admin',
            'uname' => 'txadmin',
            'email' => 'admin@txdigitizing.com',
            'country' => 'Pakistan',
            'companyname' => 'TX Digitizing',
            'caddress' =>   'Karachi, Pakistan',
            'phonenumber' =>    '03122978038',
            'password'=> Hash::make('greamesmith'),
            'role'=>'admin'
        ],
            //user
            [
                'name' => 'tx.admin1',
                'uname' => 'TX Admin',
                'email' => 'support@txdigitizing.com',
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
