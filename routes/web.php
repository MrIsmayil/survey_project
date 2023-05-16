<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SurveyController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\AnswerController;
use App\Http\Controllers\Admin\ReadyAnswerController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('answer', AnswerController::class);
    Route::get('/survey/{id}', [HomeController::class, 'surveyShow'])->name('home.survey.show');
    Route::get('/survey/{id}/edit', [HomeController::class, 'surveyEdit'])->name('home.survey.edit');
    Route::patch('/survey/update', [HomeController::class, 'surveyUpdate'])->name('home.survey.update');

});

Route::middleware(['role:admin'])->prefix('admin_dashboard')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.home.index');
    Route::resource('question', QuestionController::class);
    Route::resource('readyanswer', ReadyAnswerController::class);
    Route::resource('survey', SurveyController::class);
    Route::get('/user_surveys/{id}', [AdminController::class, 'userSurveys'])->name('user.surveys');
    Route::get('/admin_users', [AdminController::class, 'adminUsers'])->name('admin.users');
    Route::get('/admin_user/create', [AdminController::class, 'adminUserCreate'])->name('admin.user.create');

});

require __DIR__.'/auth.php';
