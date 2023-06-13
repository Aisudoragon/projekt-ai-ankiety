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
                'name' => 'Question 1',
                'answer_type' => 'radio',
                'form_id' => 1
            ],
            [
                'name' => 'Question 2',
                'answer_type' => 'checkbox',
                'form_id' => 1
            ],
            [
                'name' => 'Question 3',
                'answer_type' => 'text',
                'form_id' => 1
            ],
            [
                'name' => 'Question 4',
                'answer_type' => 'radio',
                'form_id' => 2
            ],
            [
                'name' => 'Question 5',
                'answer_type' => 'checkbox',
                'form_id' => 2
            ],
            [
                'name' => 'Question 6',
                'answer_type' => 'text',
                'form_id' => 2
            ],
            [
                'name' => 'Question 7',
                'answer_type' => 'radio',
                'form_id' => 3
            ],
            [
                'name' => 'Question 8',
                'answer_type' => 'checkbox',
                'form_id' => 3
            ],
            [
                'name' => 'Question 9',
                'answer_type' => 'text',
                'form_id' => 3
            ],
            [
                'name' => 'Question 10',
                'answer_type' => 'radio',
                'form_id' => 4
            ],
            [
                'name' => 'Question 11',
                'answer_type' => 'checkbox',
                'form_id' => 4
            ],
            [
                'name' => 'Question 12',
                'answer_type' => 'text',
                'form_id' => 4
            ],
            [
                'name' => 'Question 13',
                'answer_type' => 'radio',
                'form_id' => 5
            ],
            [
                'name' => 'Question 14',
                'answer_type' => 'checkbox',
                'form_id' => 5
            ],
            [
                'name' => 'Question 15',
                'answer_type' => 'text',
                'form_id' => 5
            ],
            [
                'name' => 'Question 16',
                'answer_type' => 'radio',
                'form_id' => 6
            ],
            [
                'name' => 'Question 17',
                'answer_type' => 'checkbox',
                'form_id' => 6
            ],
            [
                'name' => 'Question 18',
                'answer_type' => 'text',
                'form_id' => 6
            ],
            [
                'name' => 'Question 19',
                'answer_type' => 'checkbox',
                'form_id' => 7
            ],
            [
                'name' => 'Question 20',
                'answer_type' => 'text',
                'form_id' => 7
            ],
            [
                'name' => 'Question 21',
                'answer_type' => 'checkbox',
                'form_id' => 8
            ],
            [
                'name' => 'Question 22',
                'answer_type' => 'text',
                'form_id' => 8
            ],
            [
                'name' => 'Question 23',
                'answer_type' => 'checkbox',
                'form_id' => 9
            ],
            [
                'name' => 'Question 24',
                'answer_type' => 'text',
                'form_id' => 9
            ],
            [
                'name' => 'Question 25',
                'answer_type' => 'checkbox',
                'form_id' => 10
            ],
            [
                'name' => 'Question 26',
                'answer_type' => 'text',
                'form_id' => 10
            ],
            [
                'name' => 'Question 27',
                'answer_type' => 'checkbox',
                'form_id' => 11
            ],
            [
                'name' => 'Question 28',
                'answer_type' => 'text',
                'form_id' => 11
            ],
            [
                'name' => 'Question 29',
                'answer_type' => 'checkbox',
                'form_id' => 12
            ],
            [
                'name' => 'Question 30',
                'answer_type' => 'text',
                'form_id' => 12
            ],
            [
                'name' => 'Question 31',
                'answer_type' => 'checkbox',
                'form_id' => 13
            ],
            [
                'name' => 'Question 32',
                'answer_type' => 'text',
                'form_id' => 13
            ]
        ]);
    }
}
