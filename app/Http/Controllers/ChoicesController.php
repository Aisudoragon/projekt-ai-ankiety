<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Choice;
use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChoicesController extends Controller
{
    public function submitForm(Request $request, $id)
    {
        $form = Form::find($id);
        $questions = $form->getQuestions()->get();

        foreach ($questions as $question) {
            $answers[$question->id] = $question->getAnswers()->get();
        }

        $userId = Auth::id();

        foreach ($questions as $question) {
            $questionId = $question->id;
            $answerType = $question->answer_type;

            $questionKeyCheckbox = "answer_{$questionId}_checkbox";
            $questionKeyRadio = "answer_{$questionId}_radio";
            $questionKeyText = "answer_{$questionId}_text";

            $answersCheckbox = $request->input($questionKeyCheckbox);
            $answersRadio = $request->input($questionKeyRadio);
            $answersText = $request->input($questionKeyText);

            if ($answerType === 'text') {
                Choice::create([
                    'form_id' => $id,
                    'question_id' => $questionId,
                    'answer_id' => null,
                    'user_id' => $userId,
                    'text' => $answersText
                ]);
            } else {
                if (is_array($answersCheckbox)) {
                    foreach ($answersCheckbox as $answerCheckbox) {
                        Choice::create([
                            'form_id' => $id,
                            'question_id' => $questionId,
                            'answer_id' => $answerCheckbox,
                            'user_id' => $userId
                        ]);
                    }
                } elseif (!is_null($answersRadio)) {
                    Choice::create([
                        'form_id' => $id,
                        'question_id' => $questionId,
                        'answer_id' => $answersRadio,
                        'user_id' => $userId
                    ]);
                }
            }
        }

        return redirect()->route('browse');
    }
}
