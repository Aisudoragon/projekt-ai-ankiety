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
                'name' => 'Question 1'
            ],
            [
                'question_id' => 1,
                'name' => 'Question 2'
            ],
            [
                'question_id' => 1,
                'name' => 'Question 3'
            ],
            [
                'question_id' => 2,
                'name' => 'Question 4'
            ],
            [
                'question_id' => 2,
                'name' => 'Question 5'
            ],
            [
                'question_id' => 2,
                'name' => 'Question 6'
            ],
            [
                'question_id' => 3,
                'name' => 'Question 7, write your answer here'
            ]
        ]);
    }
}
