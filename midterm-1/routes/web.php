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

Route::get('/', [\App\Http\Controllers\ApplicantController::class, 'getApplicants'])->name('applicants');

Route::get('/applicants/{id}/edit', [\App\Http\Controllers\ApplicantController::class, 'getEditApplicant'])->name('applicants.edit');

Route::put('/applicants/{id}', [\App\Http\Controllers\ApplicantController::class, 'updateApplicant'])->name('applicants.update');

Route::get('/applicants/{applicant}/hired', [\App\Http\Controllers\ApplicantController::class, 'hired'])->name('applicant.hired');
