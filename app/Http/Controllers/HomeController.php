<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Survey;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        $surveys = Survey::orderBy('updated_at', 'asc')->get();

        return view('homepage', [
            // 'user' => $request->user(),
            'user' => Auth::user(),
            'surveys' => $surveys,
        ]);
    }

    public function surveyShow($id)
    {

        $survey = Survey::findOrFail($id);

        $users_count = User::all()->count();
        $user = Auth::user();

        return view('surveypage', [
            'users_count' => $users_count,
            'user' => $user,
            'survey' => $survey,

        ]);
    }

    public function surveyEdit($id)
    {

        $survey = Survey::findOrFail($id);

        $users_count = User::all()->count();
        $user = Auth::user();

        foreach($survey->questions as $question) {
            $question->answer = $question->answer = Answer::where('question_id', $question->id)->where('user_id', $user->id)->first();
        }

        return view('surveyedit', [
            'users_count' => $users_count,
            'user' => $user,
            'survey' => $survey,

        ]);
    }

    public function surveyUpdate(Request $request)
    {
        $survey = Survey::findOrFail($request->survey_id);
        $user = Auth::user();

        foreach($survey->questions as $question) {
            $question_id = $question->id;
            $user_answer = Answer::where("question_id", $question_id)->where("user_id", $user->id)->first();
            if($user_answer) {
                $user_answer->text_answer = $request->$question_id;
                $user_answer->save();
            } else {
                $new_answer = New Answer();
                $new_answer->user_id = $user->id;
                $new_answer->survey_id = $question->survey_id;
                $new_answer->question_id = $question_id;
                $new_answer->text_answer = $request->$question_id;
                $new_answer->save();
            }

        }

        return redirect(route('home.index'))->withSuccess('Ваши ответы успешно редактировались');

    }

}
