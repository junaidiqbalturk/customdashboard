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
            'name' => 'Super User',
            'uname' => 'super.user',
            'email' => 'admin@codelogicsolution.com',
            'country' => 'Pakistan',
            'companyname' => 'Code Logic Solution',
            'caddress' =>   'Karachi, Pakistan',
            'phonenumber' =>    '03122978038',
            'password'=> Hash::make('greamesmith'),
            'role'=>'admin'
        ],
        ]);
        $this->call(UsersTableSeeder::class);
    }
}
