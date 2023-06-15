<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'login' => 'user',
                'password' => Hash::make('1234'),
                'email' => 'user@email.com',
                'permission_id' => 1,
            ],
            [
                'login' => 'admin',
                'password' => Hash::make('1234'),
                'email' => 'admin@email.com',
                'permission_id' => 2
            ]
        ]);
    }
}
