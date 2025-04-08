<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/villkor', function () {
    return view('terms');
})->name('terms');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('students', StudentController::class);

Route::resource('companies', CompanyController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile/student', [StudentController::class, 'show'])->name('profile.show.student');
    Route::get('/profile/student/edit', [StudentController::class, 'edit'])->name('profile.edit.student');
    Route::patch('/profile/student', [StudentController::class, 'update'])->name('profile.update.student');
});


require __DIR__ . '/auth.php';
