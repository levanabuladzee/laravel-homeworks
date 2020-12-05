<?php

use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get("/", [\App\Http\Controllers\UserController::class, "login"])->name("login");

Route::get("/questions", [\App\Http\Controllers\QuestionController::class, "index"])->name("questions.all")->middleware(IsAdmin::class);;

Route::get("/questions/create", [\App\Http\Controllers\QuestionController::class, "createQuestion"])->name("questions.create")->middleware(IsAdmin::class);

Route::post('/questions/save', [\App\Http\Controllers\QuestionController::class, 'save'])->name('questions.save')->middleware('auth');

Route::get("/quiz", [\App\Http\Controllers\QuizController::class, "index"])->name("quiz")->middleware('auth');

Route::get("/users/login", [\App\Http\Controllers\UserController::class, "login"])->name("login");

Route::post("/users/post-login", [\App\Http\Controllers\UserController::class, "postLogin"])->name("post.login");

Route::post("/users/logout", [\App\Http\Controllers\UserController::class, "logout"])->name("logout")->middleware('auth');

Route::get('/quiz', [\App\Http\Controllers\QuizController::class, 'index'])->name('quiz')->middleware('auth');

Route::post('/quiz/save', [\App\Http\Controllers\QuizController::class, 'save'])->name('quiz.save')->middleware('auth');
