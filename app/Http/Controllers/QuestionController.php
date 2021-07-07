<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Questionnaire;

class QuestionController extends Controller
{
    public function create(Questionnaire $questionnaire) {
        return view('question.create', compact('questionnaire'));
    }

    public function store(Questionnaire $questionnaire) {
        $data     = request()->validate(
            [
                'question' => ['required'],
                'answer'   => [
                    'required',
                    'array',
                ],
                'answer.*' => ['required'],
            ]
        );
        $question = $questionnaire->questions()->create(['question' => $data['question']]);
        $answers  = [];
        foreach ($data['answer'] as $answer) {
            $answers[] = ['answer' => $answer];
        }

        $question->answers()->createMany($answers);

        return redirect('/questionnaire/' . $questionnaire->id);
    }
}