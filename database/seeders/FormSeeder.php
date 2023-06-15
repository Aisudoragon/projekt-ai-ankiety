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
                'user_id' => 2,
                'name' => 'Form 2',
                'description' => 'Description 2',
                'suggested_time' => 20
            ]
        ]);
    }
}
