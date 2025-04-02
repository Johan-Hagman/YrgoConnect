<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/register', [App\Http\Controllers\RegistrationController::class, 'showStep1'])->name('register');
Route::post('/register', [App\Http\Controllers\RegistrationController::class, 'storeStep1']);
Route::get('/register/student', [App\Http\Controllers\RegistrationController::class, 'showStudentForm'])->name('register.student');
Route::post('/register/student', [App\Http\Controllers\RegistrationController::class, 'storeStudent']);
Route::get('/register/company', [App\Http\Controllers\RegistrationController::class, 'showCompanyForm'])->name('register.company');
Route::post('/register/company', [App\Http\Controllers\RegistrationController::class, 'storeCompany']);

require __DIR__ . '/auth.php';
