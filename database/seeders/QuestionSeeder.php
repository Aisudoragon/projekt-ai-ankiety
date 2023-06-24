<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('questions')->insert([
            [
                'name' => 'The type of bread',
                'answer_type' => 'checkbox',
                'form_id' => 1
            ],
            [
                'name' => 'The shape of bread',
                'answer_type' => 'checkbox',
                'form_id' => 1
            ],
            [
                'name' => 'The size of bread',
                'answer_type' => 'checkbox',
                'form_id' => 1
            ],
            [
                'name' => 'Are you stupid?',
                'answer_type' => 'radio',
                'form_id' => 2
            ],
            [
                'name' => "What's your favourite colour?",
                'answer_type' => 'radio',
                'form_id' => 2
            ],
            [
                'name' => 'What is the airspeed velocity of an unladen swallow?',
                'answer_type' => 'text',
                'form_id' => 2
            ],
            [
                'name' => 'Answer to the Ultimate Question of Life, the Universe, and Everything',
                'answer_type' => 'text',
                'form_id' => 2
            ],
            [
                'name' => 'What is your favourite programming language?',
                'answer_type' => 'radio',
                'form_id' => 3
            ],
            [
                'name' => 'Do you feel the dread in this cruel universe?',
                'answer_type' => 'radio',
                'form_id' => 3
            ],
            [
                'name' => 'Would you recommend Laravel to your friends?',
                'answer_type' => 'radio',
                'form_id' => 3
            ]
        ]);
    }
}
