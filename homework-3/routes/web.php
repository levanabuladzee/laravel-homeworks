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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index'])->name('posts');

Route::get('/posts/create', [\App\Http\Controllers\PostController::class, 'create'])->name('posts.create');

Route::post('/posts/save', [\App\Http\Controllers\PostController::class, 'save'])->name('posts.save');

Route::get('/posts/{id}', [\App\Http\Controllers\PostController::class, 'show'])->name('posts.post');

Route::get('/posts/{id}/edit', [\App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');

Route::put('/posts/{id}/update', [\App\Http\Controllers\PostController::class, 'update'])->name('posts.update');

Route::delete('/posts/{post}/delete', [\App\Http\Controllers\PostController::class, 'delete'])->name('posts.delete');

Route::get('/login', [\App\Http\Controllers\LoginController::class, 'getLogin'])->name('login');

Route::post('/post_login', [\App\Http\Controllers\LoginController::class, 'login'])->name('post.login');

Route::post('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

Route::get('/register', [\App\Http\Controllers\LoginController::class, 'getRegister'])->name('register');

Route::post('/post_register', [\App\Http\Controllers\LoginController::class, 'register'])->name('post.register');

Route::get('/my_posts', [\App\Http\Controllers\PostController::class, 'myPosts'])->name('post.myposts');

Route::post('/posts/{post}/approve', [\App\Http\Controllers\PostController::class, 'approve'])->name('approve');

Route::get('/email/create', [\App\Http\Controllers\MailController::class, 'create'])->name('mail.create');

Route::post('/email/send', [\App\Http\Controllers\MailController::class, 'send'])->name('send');

Route::middleware('auth')->group( function () {
    Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index'])->name('posts');

    Route::get('/posts/create', [\App\Http\Controllers\PostController::class, 'create'])->name('posts.create');

    Route::post('/posts/save', [\App\Http\Controllers\PostController::class, 'save'])->name('posts.save');

    Route::get('/posts/{id}', [\App\Http\Controllers\PostController::class, 'show'])->name('posts.post');

    Route::get('/posts/{id}/edit', [\App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');

    Route::put('/posts/{id}/update', [\App\Http\Controllers\PostController::class, 'update'])->name('posts.update');

    Route::delete('/posts/{post}/delete', [\App\Http\Controllers\PostController::class, 'delete'])->name('posts.delete');

    Route::get('/my_posts', [\App\Http\Controllers\PostController::class, 'myPosts'])->name('post.myposts');

    Route::post('/posts/{post}/approve', [\App\Http\Controllers\PostController::class, 'approve'])->name('approve');

    Route::post('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

    Route::get('/email/create', [\App\Http\Controllers\MailController::class, 'create'])->name('mail.create');

    Route::post('/email/send', [\App\Http\Controllers\MailController::class, 'send'])->name('send');
});
