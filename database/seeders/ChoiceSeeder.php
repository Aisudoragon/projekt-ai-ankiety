<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('choices')->insert([
            [
                'form_id' => 1,
                'question_id' => 1,
                'answer_id' => 3,
                'user_id' => 4
            ],
            [
                'form_id' => 1,
                'question_id' => 1,
                'answer_id' => 4,
                'user_id' => 4
            ],
            [
                'form_id' => 1,
                'question_id' => 1,
                'answer_id' => 5,
                'user_id' => 4
            ],
            [
                'form_id' => 1,
                'question_id' => 1,
                'answer_id' => 7,
                'user_id' => 4
            ],
            [
                'form_id' => 1,
                'question_id' => 1,
                'answer_id' => 8,
                'user_id' => 4
            ],
            [
                'form_id' => 1,
                'question_id' => 1,
                'answer_id' => 9,
                'user_id' => 4
            ],
            [
                'form_id' => 1,
                'question_id' => 1,
                'answer_id' => 10,
                'user_id' => 4
            ],
            [
                'form_id' => 1,
                'question_id' => 1,
                'answer_id' => 11,
                'user_id' => 4
            ],
            [
                'form_id' => 1,
                'question_id' => 2,
                'answer_id' => 13,
                'user_id' => 4
            ],
            [
                'form_id' => 1,
                'question_id' => 2,
                'answer_id' => 14,
                'user_id' => 4
            ],
            [
                'form_id' => 1,
                'question_id' => 3,
                'answer_id' => 16,
                'user_id' => 4
            ],
            [
                'form_id' => 1,
                'question_id' => 3,
                'answer_id' => 18,
                'user_id' => 4
            ],
            [
                'form_id' => 1,
                'question_id' => 1,
                'answer_id' => 2,
                'user_id' => 6
            ],
            [
                'form_id' => 1,
                'question_id' => 1,
                'answer_id' => 6,
                'user_id' => 6
            ],
            [
                'form_id' => 1,
                'question_id' => 1,
                'answer_id' => 11,
                'user_id' => 6
            ],
            [
                'form_id' => 1,
                'question_id' => 2,
                'answer_id' => 13,
                'user_id' => 6
            ],
            [
                'form_id' => 1,
                'question_id' => 3,
                'answer_id' => 18,
                'user_id' => 6
            ],
            [
                'form_id' => 1,
                'question_id' => 1,
                'answer_id' => 4,
                'user_id' => 2
            ],
            [
                'form_id' => 1,
                'question_id' => 1,
                'answer_id' => 9,
                'user_id' => 2
            ],
            [
                'form_id' => 1,
                'question_id' => 2,
                'answer_id' => 14,
                'user_id' => 2
            ],
            [
                'form_id' => 1,
                'question_id' => 3,
                'answer_id' => 16,
                'user_id' => 2
            ],
            [
                'form_id' => 1,
                'question_id' => 3,
                'answer_id' => 17,
                'user_id' => 2
            ]
        ]);
    }
}
