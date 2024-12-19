<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\applicantcontroller;
use App\Http\Controllers\FacultyController;
use Illuminate\Support\Facades\Route;

// Welcome Page
Route::get('/', function () {
    return view('welcome');
});

// Dashboard Route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Include Authentication Routes
require __DIR__ . '/auth.php';

// Applicant Routes
Route::middleware('auth')->prefix('applicants')->group(function () {
    // List all applicants
    Route::get('/', [applicantcontroller::class, 'index'])->name('applicants.index');

    // Show the form to create a new applicant
    Route::get('/create', [applicantcontroller::class, 'create'])->name('applicants.create');

    // Store a newly created applicant
    // Route::post('/', [applicantcontroller::class, 'store'])->name('applicants.store');

    // Show a single applicant
    Route::get('/{id}', [applicantcontroller::class, 'show'])->name('applicants.show');

    // Show the form to edit an applicant
    Route::get('/{id}/edit', [applicantcontroller::class, 'edit'])->name('applicants.edit');

    // Update an existing applicant
    Route::put('/{id}', [applicantcontroller::class, 'update'])->name('applicants.update');

    // Delete an applicant
    Route::delete('/{id}', [applicantcontroller::class, 'destroy'])->name('applicants.destroy');
});

// Faculty Routes
Route::middleware('auth')->prefix('faculties')->group(function () {
    // List all faculties
    Route::get('/', [FacultyController::class, 'index'])->name('faculties.index');

    // Show the form to create a new faculty
    Route::get('/create', [FacultyController::class, 'create'])->name('faculties.create');

    // Store a newly created faculty
    Route::post('/', [FacultyController::class, 'store'])->name('faculties.store');

    // Show a single faculty
    Route::get('/{id}', [FacultyController::class, 'show'])->name('faculties.show');

    // Show the form to edit a faculty
    Route::get('/{id}/edit', [FacultyController::class, 'edit'])->name('faculties.edit');

    // Update an existing faculty
    Route::put('/{id}', [FacultyController::class, 'update'])->name('faculties.update');

    // Delete a faculty
    Route::delete('/{id}', [FacultyController::class, 'destroy'])->name('faculties.destroy');
});
