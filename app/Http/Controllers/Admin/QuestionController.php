<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Survey;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
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
        $new_question = New Question;
        $new_question->survey_id = $request->surveyId;
        $new_question->text_question = $request->questionTitle;
        $new_question->save();

        return redirect(route('survey.edit', $request->surveyId))->withSuccess('Вопрос была успешно добавлена!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        $question->text_question = $request->questionTitle;
        $question->save();

        return redirect()->back()->withSuccess('Вопрос был успешно редактирован!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {

        dd("text question", $question);

        $survey_id = $question->survey_id;
        $question->delete();
        return redirect(route('survey.edit', $survey_id))->withSuccess('Вопрос был успешно удален!');

    }
}
