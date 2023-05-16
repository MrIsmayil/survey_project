<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Survey;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $survey = Survey::findOrFail($request->survey_id);
        $user = Auth::user();
        $user->surveys()->attach([$request->survey_id]);

        foreach($survey->questions as $question) {
            $question_id = $question->id;
            $new_answer = New Answer();
            $new_answer->user_id = Auth::user()->id;
            $new_answer->survey_id = $question->survey_id;
            $new_answer->question_id = $question_id;
            $new_answer->text_answer = $request->$question_id;
            $new_answer->save();
        }

        return redirect(route('home.index'))->withSuccess('Ваши ответы успешно сохранились');
    }

    /**
     * Display the specified resource.
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Answer $answer)
    {
        //
    }
}
