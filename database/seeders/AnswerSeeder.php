<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('answers')->insert([
            [
                'question_id' => 1,
                'name' => 'Answer 1'
            ],
            [
                'question_id' => 1,
                'name' => 'Answer 2'
            ],
            [
                'question_id' => 1,
                'name' => 'Answer 3'
            ],
            [
                'question_id' => 2,
                'name' => 'Answer 4'
            ],
            [
                'question_id' => 2,
                'name' => 'Answer 5'
            ],
            [
                'question_id' => 2,
                'name' => 'Answer 6'
            ],
            [
                'question_id' => 3,
                'name' => 'Answer 7, write your answer here'
            ]
        ]);
    }
}
