<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('forms')->insert([
            [
                'user_id' => 1,
                'name' => 'What bread do you like?',
                'description' => 'This survey is to find out what bread people like',
                'suggested_time' => 10
            ],
            [
                'user_id' => 3,
                'name' => 'A little joke',
                'description' => 'This surveys serves no purpose other than to make you laugh',
                'suggested_time' => 240
            ],
            [
                'user_id' => 2,
                'name' => "It's a little tiring",
                'description' => 'It was hard to fill all of these surveys',
                'suggested_time' => 5
            ]
        ]);
    }
}
