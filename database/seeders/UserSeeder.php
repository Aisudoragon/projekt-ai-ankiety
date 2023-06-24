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
                'login' => 'typicalUser',
                'password' => Hash::make('password123'),
                'email' => 'user@email.com',
                'permission_id' => 1,
            ],
            [
                'login' => 'typicalAdmin',
                'password' => Hash::make('password123'),
                'email' => 'admin@email.com',
                'permission_id' => 2
            ],
            [
                'login' => 'typicalOperator',
                'password' => Hash::make('password123'),
                'email' => 'operator@email.com',
                'permission_id' => 3
            ],
            [
                'login' => 'justAnotherUser',
                'password' => Hash::make('password123'),
                'email' => 'email@email.com',
                'permission_id' => 1
            ],
            [
                'login' => 'userThatIsNotAdmin',
                'password' => Hash::make('password123'),
                'email' => 'anotheremail@email.com',
                'permission_id' => 1
            ],
            [
                'login' => 'aRandomUser',
                'password' => Hash::make('password123'),
                'email' => 'random@email.com',
                'permission_id' => 1
            ]
        ]);
    }
}
