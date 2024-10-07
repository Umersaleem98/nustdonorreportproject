<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\StudentsDashboardController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/donor_profile', [DonorController::class, 'index']);
Route::get('/donor_show/{id}', [DonorController::class, 'show']);


Route::get('admin', [AdminController::class, 'index']);
Route::get('login', [AdminController::class, 'sign_in']);
Route::get('register', [AdminController::class, 'sign_up']);

Route::get('students', [StudentsDashboardController::class, 'index']);
Route::post('students_import', [StudentsDashboardController::class, 'import']);





