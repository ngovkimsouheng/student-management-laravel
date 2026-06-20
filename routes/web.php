<?php

use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/subjects/create', [SubjectController::class, 'create']);
Route::post('/subjects', [SubjectController::class, 'store']);
// Resource routes for CRUD operations
Route::resource('students', StudentController::class);
Route::resource('classes', SchoolClassController::class);
Route::resource('subjects', SubjectController::class);
Route::post('/classes/{class}/add-subject', [SchoolClassController::class, 'addSubject'])
    ->name('classes.add-subject');
