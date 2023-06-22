<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FormsController extends Controller
{
    public function index()
    {

        if (auth()->check()) {
            $data = Form::whereDoesntHave('users', function ($query) {
                $query->where('id', auth()->user()->id);
            })->whereDoesntHave('getChoices', function ($query) {
                $query->where('user_id', auth()->user()->id);
            })->get();
        } else {
            $data = Form::all();
        }

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

            $validator = Validator::make($request->all(), [
                'form_name' => 'required|max:100',
                'form_description' => 'max:500',
                'question.*' => 'required|max:200',
                'answer.*.*' => 'required|max:200',
                'question' => 'required|array|min:1',
                'answer.*' => 'required|array|min:2',
            ]);

            $validator->setAttributeNames([
                'question.*' => 'question',
                'answer.*.*' => 'answer',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }


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

    public function statistics($id)
        {
            $dane = Form::find($id);
            $questions = $dane->getQuestions()->get();

            foreach ($questions as $question) {
                if ($question->type != 'text') {
                    $answers[$question->id] = $question->getAnswers()->get();
                } else {
                    $answers[$question->id] = $question->getChoices()->get();
                }

                $responsesCount[$question->id] = $question->getChoices()
                    ->groupBy('answer_id')
                    ->selectRaw('answer_id, count(*) as total')
                    ->pluck('total', 'answer_id')
                    ->toArray();
            }

            $choices = $dane->getChoices()->get();
            $answersCount = $choices->where('form_id', $id)->unique('form_id')->count();

            return view('manage-statistics', [
                'form' => $dane,
                'questions' => $questions,
                'answers' => $answers,
                'answersCount' => $answersCount,
                'responsesCount' => $responsesCount
            ]);
        }

    public function destroy($id)
        {
            $form = Form::find($id);
            $form->delete();

            return redirect()->back()->with('success', 'Form deleted successfully!');
        }

    public function adminForms()
        {
            $forms = Form::all();

            return view('admin-surveys', ['forms' => $forms]);
        }

    public function adminFormsDelete($id)
        {
            $form = Form::find($id);
            $form->delete();

            return redirect()->back()->with('success', 'Form deleted successfully!');
        }
}
