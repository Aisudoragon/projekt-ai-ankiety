<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;

class FormsController extends Controller
{
    public function index()
        {
            $data = Form::all();
            return view('browse', ['forms' => $data]);
        }

    public function show($id)
        {
            $dane = Form::find($id);
            $questions = $dane->getQuestions()->get();
            return view('form', ['form' => $dane, 'questions' => $questions]);
        }
}
