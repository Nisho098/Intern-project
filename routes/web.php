<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AttendanceController;

// Authentication routes with email verification
Auth::routes(['verify' => true]);

// Public routes
Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', [AdminController::class, 'index'])->name('backend.dashboard.layouts.app');


// Resource route for BranchController
Route::resource('employees', EmployeeController::class);
Route::resource('branches', BranchController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('designations', DesignationController::class);
Route::resource('attendances', AttendanceController::class);


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/email/verify', function () {
    return view('auth.verify');
})->name('verification.notice');

// Protected routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])
        ->name('backend.dashboard.layouts.app');
    Route::get('/verify-form', [VerificationController::class, 'showVerifyForm'])->name('verify.form');
    Route::post('/verify-number', [VerificationController::class, 'verifyNumber'])->name('verify.number');
});


