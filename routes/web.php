<?php

use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\Room1Controller;
// use App\Http\Controllers\RoomController;
use App\Http\Controllers\Student1Controller;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\StudentController;
use App\Http\Controllers\Teacher1Controller;
// use App\Http\Controllers\TeacherController;


Route::get('/', function () {
    return view('layout.master');
});

//route for students//
Route::resource('student', Student1Controller::class);

//route for teacher//
Route::resource('teacher', Teacher1Controller::class);

// route for room//
Route::resource('room', Room1Controller::class);

Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard');
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::get('register', [CustomAuthController::class, 'registration'])->name('register');




Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');