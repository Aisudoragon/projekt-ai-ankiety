<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use Illuminate\Support\Facades\Auth;

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

            foreach ($questions as $question) {
                $answers[$question->id] = $question->getAnswers()->get();
            }

            return view('form', ['form' => $dane, 'questions' => $questions, 'answers' => $answers]);
        }

    public function manage()
        {
            $user = Auth::user();
            $forms = $user->getForms;

            return view('manage', ['forms' => $forms, 'user' => $user]);
        }

    public function create()
        {
            return view('create');
        }
}
