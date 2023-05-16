<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Survey;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index() {
        $users_count = User::all()->count();
        $surveys_count = Survey::all()->count();
        $user = Auth::user();

        return view('admin.home.index', [
            'users_count' => $users_count,
            'surveys_count' => $surveys_count,
            'user' => $user,
        ]);

    }

    public function adminUsers() {
        $users = User::all();
        $user = Auth::user();
        $surveys_count = Survey::all()->count();

        return view('admin.user.index', [
            'users' => $users,
            'users_count' => count($users),
            'user' => $user,
            'surveys_count' => $surveys_count,
        ]);

    }

    public function adminUserCreate() {
        $users = User::all();
        $user = Auth::user();
        $surveys_count = Survey::all()->count();

        return view('admin.user.create', [
            'users' => $users,
            'users_count' => count($users),
            'user' => $user,
            'surveys_count' => $surveys_count,
        ]);

    }

    public function userSurveys($id) {

        $users = User::all();
        $user = User::findOrFail($id);
        $surveys_count = Survey::all()->count();

        foreach($user->surveys as $survey) {

            foreach($survey->questions as $question) {
                $question->answer = Answer::where('question_id', $question->id)->where('user_id', $user->id)->first();
            }
        }

        return view('admin.user.show', [
            'user' => $user,
            'users' => $users,
            'users_count' => count($users),
            'answers' => $user->answers,
            'surveys_count' => $surveys_count,
        ]);

    }
}
