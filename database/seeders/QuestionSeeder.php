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
            ]
        ]);
    }
}
