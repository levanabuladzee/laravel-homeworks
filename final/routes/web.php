<?php

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

Route::middleware("deny.auth")->group(function () {
    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'getLogin'])->name('login');

    Route::get('/register', [\App\Http\Controllers\AuthController::class, 'getRegister'])->name('register');

    Route::post('/post_login', [\App\Http\Controllers\AuthController::class, 'login'])->name('post_login');

    Route::post('/post_register', [\App\Http\Controllers\AuthController::class, 'register'])->name('post_register');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [\App\Http\Controllers\QuestionController::class, 'index'])->name('home');

    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

    Route::get('/questions', [\App\Http\Controllers\QuestionController::class, 'myQuestions'])->name('my_question');

    Route::get('/questions/{question}', [\App\Http\Controllers\QuestionController::class, 'show'])->name('show_question');

    Route::get('/search', [\App\Http\Controllers\QuestionController::class, 'search'])->name('search_question');

    Route::post('/questions', [\App\Http\Controllers\QuestionController::class, 'store'])->name('post_question');

    Route::get('/questions/{question}/edit', [\App\Http\Controllers\QuestionController::class, 'edit'])->name('edit_question');

    Route::put('/questions/{question}', [\App\Http\Controllers\QuestionController::class, 'update'])->name('put_question');

    Route::delete('/questions/{question}', [\App\Http\Controllers\QuestionController::class, 'destroy'])->name('delete_question');

    Route::get('/users/{user}', [\App\Http\Controllers\QuestionController::class, 'userQuestions'])->name('user_question');

    Route::put('/questions/{question}/upvote', [\App\Http\Controllers\QuestionController::class, 'upvote'])->name('upvote_question');

    Route::put('/questions/{question}/downvote', [\App\Http\Controllers\QuestionController::class, 'downvote'])->name('downvote_question');

    Route::get('/tags/{tag}', [\App\Http\Controllers\QuestionController::class, 'tags'])->name('questions_by_tags');

    Route::post('/questions/{question}/answer', [\App\Http\Controllers\AnswerController::class, 'store'])->name('post_answer');

    Route::delete('/answers/{answer}', [\App\Http\Controllers\AnswerController::class, 'destroy'])->name('delete_answer');
});
