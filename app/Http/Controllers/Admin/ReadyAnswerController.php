<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReadyAnswer;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ReadyAnswerController extends Controller
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
        $new_ready_answer = New ReadyAnswer;
        $new_ready_answer->question_id = $request->questionId;
        $new_ready_answer->text_answer = $request->questionAnswer;
        $new_ready_answer->save();

        return redirect()->back()->withSuccess('Ответ был успешно добавлен!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ReadyAnswer $readyAnswer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReadyAnswer $readyAnswer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $readyAnswer = ReadyAnswer::findOrFail($id);
        $readyAnswer->text_answer = $request->questionAnswer;
        $readyAnswer->save();

        return redirect()->back()->withSuccess('Ответ был успешно редактирован!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // $survey_id = $readyAnswer->question->survey_id;
        $readyAnswer = ReadyAnswer::findOrFail($id);
        $text_answer = $readyAnswer->text_answer;

        $readyAnswer->delete();
        // return redirect(route('survey.edit', $survey_id))->withSuccess('Ответ была успешно удален!');
        return redirect()->back()->withSuccess("Ответ $text_answer был успешно удален!");
    }
}
