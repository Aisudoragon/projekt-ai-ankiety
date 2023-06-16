<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\Question;
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
                if ($question->type != 'text') {
                    $answers[$question->id] = $question->getAnswers()->get();
                }
            }

            return view('form', ['form' => $dane, 'questions' => $questions, 'answers' => $answers]);
        }

    public function manage()
        {
            $user = Auth::user();
            $forms = $user->getForms;

            return view('manage', ['forms' => $forms, 'user' => $user]);
        }

    public function create(Request $request)
        {
            $user = Auth::user();

            $formName = $request->input('form_name');
            $formDescription = $request->input('form_description');

            $form = new Form();
            $form->name = $formName;
            $form->description = $formDescription;
            $form->user_id = $user->id;

            $form->save();

            $questions = $request->input('question');
            $answers = $request->input('answer');

            foreach ($questions as $questionIndex => $questionData) {
                $questionType = $request->input("question_type.$questionIndex");

                $question = new Question();
                $question->form_id = $form->id;
                $question->name = $questionData;
                $question->answer_type = $questionType;
                $question->save();

                if ($question->answer_type != 'text') {
                    $answerTexts = $answers[$questionIndex] ?? [];

                    foreach ($answerTexts as $answerText) {
                        $answer = new Answer();
                        $answer->question_id = $question->id;
                        $answer->name = $answerText;
                        $answer->save();
                    }
                }
            }

            return redirect()->route('manage')->with('success', 'Form created successfully!');
        }
}
