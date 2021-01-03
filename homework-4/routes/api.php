<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['cors', 'json.response', 'auth:api'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', 'App\Http\Controllers\Auth\ApiAuthController@logout')->name('logout.api');
    Route::get('/articles', 'App\Http\Controllers\ArticleController@index')->name('articles.index');
    Route::get('/articles/{article}', 'App\Http\Controllers\ArticleController@show')->name('articles.show');
    Route::post('/articles', 'App\Http\Controllers\ArticleController@store')->name('articles.store');
    Route::put('/articles/{article}', 'App\Http\Controllers\ArticleController@update')->name('articles.update');
    Route::delete('/articles/{article}', 'App\Http\Controllers\ArticleController@destroy')->name('articles.destroy');
});

Route::group(['middleware' => ['cors', 'json.response']], function () {
    // Public Routes
    Route::post('/login', 'App\Http\Controllers\Auth\ApiAuthController@login')->name('login.api');
    Route::post('/register','App\Http\Controllers\Auth\ApiAuthController@register')->name('register.api');
});
