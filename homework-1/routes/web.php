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
});

Route::get('/phones', [\App\Http\Controllers\PhoneController::class, 'getPhones'])->name('phones');

Route::get('/phones/create', [\App\Http\Controllers\PhoneController::class, 'getCreatePhone'])->name('phones.create');

Route::post('/phones', [\App\Http\Controllers\PhoneController::class, 'savePhone'])->name('phones.save');

Route::get('/phones/{id}/edit', [\App\Http\Controllers\PhoneController::class, 'getEditPhone'])->name('phones.edit');

Route::put('/phones/{id}', [\App\Http\Controllers\PhoneController::class, 'updatePhone'])->name('phones.update');

Route::delete('/phones/{phone}', [\App\Http\Controllers\PhoneController::class, 'deletePhone'])->name('phones.delete');

Route::get('/phones/{id}', [\App\Http\Controllers\PhoneController::class, 'getPhone'])->name('phones.phone');
