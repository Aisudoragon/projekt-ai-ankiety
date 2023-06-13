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
                'name' => 'Form 1',
                'description' => 'Description 1',
                'suggested_time' => 10
            ],
            [
                'user_id' => 1,
                'name' => 'Form 2',
                'description' => 'Description 2',
                'suggested_time' => 20
            ],
            [
                'user_id' => 1,
                'name' => 'Form 3',
                'description' => 'Description 3',
                'suggested_time' => 30
            ],
            [
                'user_id' => 1,
                'name' => 'Form 4',
                'description' => 'Description 4',
                'suggested_time' => 40
            ],
            [
                'user_id' => 1,
                'name' => 'Form 5',
                'description' => 'Description 5',
                'suggested_time' => 50
            ],
            [
                'user_id' => 1,
                'name' => 'Form 6',
                'description' => 'Description 6',
                'suggested_time' => 60
            ],
            [
                'user_id' => 1,
                'name' => 'Form 7',
                'description' => 'Description 7',
                'suggested_time' => 70
            ],
            [
                'user_id' => 1,
                'name' => 'Form 8',
                'description' => 'Description 8',
                'suggested_time' => 80
            ],
            [
                'user_id' => 1,
                'name' => 'Form 9',
                'description' => 'Description 9',
                'suggested_time' => 90
            ],
            [
                'user_id' => 1,
                'name' => 'Form 10',
                'description' => 'Description 10',
                'suggested_time' => 100
            ],
            [
                'user_id' => 1,
                'name' => 'Form 11',
                'description' => 'Description 11',
                'suggested_time' => 110
            ],
            [
                'user_id' => 1,
                'name' => 'Form 12',
                'description' => 'Description 12',
                'suggested_time' => 120
            ],
            [
                'user_id' => 1,
                'name' => 'Form 13',
                'description' => 'Description 13',
                'suggested_time' => 130
            ]
        ]);
    }
}
