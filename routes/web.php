<?php

use App\Http\Controllers\DarasaController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//for teacher
Route::resource('teacher', TeacherController::class)
    ->only(['index','store']);

//for student
Route::resource('student', StudentController::class)
    ->only(['index','store']);

//for Guardian
Route::resource('guardian', GuardianController::class)
    ->only(['index','store']);

//for Darasa
Route::resource('darasa', DarasaController::class)
    ->only(['store']);

require __DIR__.'/auth.php';
