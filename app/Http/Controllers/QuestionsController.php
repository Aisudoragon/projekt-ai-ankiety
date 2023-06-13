<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionsController extends Controller
{
    public function index()
        {
            $data = Question::all();
            return view('browse', ['questions' => $data]);
        }
}
