<?php

namespace App\Http\Controllers;

use App\Models\Questionnaire;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function show(Questionnaire $questionnaire, $slug) {
        $questionnaire->load('questions.answers');
        return view('survey.show', compact('questionnaire'));
    }

    public function store(Questionnaire $questionnaire, $slug) {
        $data = request()->validate(
            [
                'name'                 => ['required'],
                'email'                => [
                    'required',
                    'email',
                ],
                'answer.*.question_id' => [
                    'required',
                    'numeric',
                ],
                'answer.*.answer_id'   => [
                    'required',
                    'numeric',
                ],
            ]
        );

        $survey = $questionnaire->surveys()->create(['name' => $data['name'], 'email' => $data['email']]);
        $survey->responses()->createMany($data['answer']);

        return 'Thank you';
    }
}
