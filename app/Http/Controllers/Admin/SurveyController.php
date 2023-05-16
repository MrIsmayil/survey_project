<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Survey;
use App\Models\Question;
use App\Models\ReadyAnswer;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users_count = User::all()->count();
        $user = Auth::user();
        $surveys = Survey::orderBy('updated_at', 'desc')->get();
        $surveys_count = Survey::all()->count();


        return view('admin.survey.index', [
            'users_count' => $users_count,
            'user' => $user,
            'surveys' => $surveys,
            'surveys_count' => $surveys_count,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users_count = User::all()->count();
        $user = Auth::user();
        $surveys_count = Survey::all()->count();


        return view('admin.survey.create', [
            'users_count' => $users_count,
            'user' => $user,
            'surveys_count' => $surveys_count,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $new_survey = New Survey();
        $new_survey->title = $request->surveyTitle;
        $new_survey->save();

        $new_question = New Question;
        $new_question->survey_id = $new_survey->id;
        $new_question->text_question = $request->surveyQuestion;
        $new_question->save();

        if($request->has('questionAnswer')) {
            $new_ready_answer = New ReadyAnswer;
            $new_ready_answer->question_id = $new_question->id;
            $new_ready_answer->text_answer = $request->questionAnswer;
            $new_ready_answer->save();
        }

        return redirect(route('survey.edit', $new_survey->id))->withSuccess('Опрос был успешно добавлен!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Survey $survey)
    {

        $users_count = User::all()->count();
        $user = Auth::user();
        $surveys_count = Survey::all()->count();

        return view('surveypage', [
            'users_count' => $users_count,
            'user' => $user,
            'survey' => $survey,
            'surveys_count' => $surveys_count,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Survey $survey)
    {
        $users_count = User::all()->count();
        $user = Auth::user();
        $surveys_count = Survey::all()->count();


        return view('admin.survey.edit', [
            'users_count' => $users_count,
            'user' => $user,
            'survey' => $survey,
            'surveys_count' => $surveys_count,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Survey $survey)
    {
        $survey->title = $request->surveyTitle;
        $survey->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Survey $survey)
    {
        $survey->delete();
        return redirect()->back()->withSuccess('Опрос был успешно удален!');
    }
}
