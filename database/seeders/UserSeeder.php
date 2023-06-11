<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'password' => '1234',
                'email' => 'user@email.com',
                'permission_id' => 1,
            ],
            [
                'login' => 'moderator',
                'password' => '1234',
                'email' => 'moderator@email.com',
                'permission_id' => 2,
            ],
            [
                'login' => 'admin',
                'password' => '1234',
                'email' => 'admin@email.com',
                'permission_id' => 3,
            ],
            [
                'login' => 'superadmin',
                'password' => '1234',
                'email' => 'superadmin@email.com',
                'permission_id' => 4,
            ]
        ]);
    }
}
