<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\DonorDashboardController;
use App\Http\Controllers\StudentsDashboardController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/donor_profile', [DonorController::class, 'index']);
Route::get('/login/{id?}', [DonorController::class, 'loginPage'])->name('login');
Route::post('/login_submit', [DonorController::class, 'authenticate']);
Route::get('/donor_show/{id}', [DonorController::class, 'show'])->name('donor_show');



Route::get('admin', [AdminController::class, 'index']);
Route::get('login', [AdminController::class, 'sign_in']);
Route::get('register', [AdminController::class, 'sign_up']);

Route::get('students', [StudentsDashboardController::class, 'index']);
Route::post('students_import', [StudentsDashboardController::class, 'import']);



Route::get('/students_edit/{id}', [StudentsDashboardController::class, 'editstudents']);
Route::post('/update_student/{id}', [StudentsDashboardController::class, 'updatestudent']);
Route::get('/students_delete/{id}', [StudentsDashboardController::class, 'delete']);

Route::get('donor_list', [DonorDashboardController::class, 'index']);
Route::get('donors_edit/{id}', [DonorDashboardController::class, 'edit']);
Route::post('update_donor/{id}', [DonorDashboardController::class, 'update']);
Route::get('donors_delete/{id}', [DonorDashboardController::class, 'delete']);




