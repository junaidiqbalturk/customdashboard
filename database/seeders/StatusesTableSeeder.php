<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('statuses')->insert([
            ['name' => 'Processing', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Delivered', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cancelled', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'on-hold', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pending-Payment', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
