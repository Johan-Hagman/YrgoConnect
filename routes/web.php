<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\FavoriteController;
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
    Route::get('/student/show', [StudentController::class, 'show'])->name('student.show');
    Route::get('/student/index', [StudentController::class, 'index'])->name('student.index');
    Route::get('/student/edit', [StudentController::class, 'edit'])->name('student.edit');
    Route::patch('/student/show', [StudentController::class, 'update'])->name('student.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/company/show', [CompanyController::class, 'show'])->name('company.show');
    Route::get('/company/edit', [CompanyController::class, 'edit'])->name('company.edit');
    Route::patch('/company/show', [CompanyController::class, 'update'])->name('company.update');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
});


require __DIR__ . '/auth.php';
