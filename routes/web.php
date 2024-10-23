<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\DonorDashboardController;
use App\Http\Controllers\StudentsDashboardController;

// Route::get('/', [HomeController::class, 'index']);

Route::get('/', [DonorController::class, 'index']);
// Route::get('/donor_profile', [DonorController::class, 'index']);
Route::get('/donorlogin/{id?}', [DonorController::class, 'loginPage']);
Route::post('/login_submit', [DonorController::class, 'authenticate']);
Route::get('/donor_show/{id}', [DonorController::class, 'show'])->name('donor_show');
Route::get('/logout', [DonorController::class, 'logout_donor']);

Route::get('login', [AdminController::class, 'loginindex'])->name('login');
Route::post('userlogin', [AdminController::class, 'loginsubmit']);
Route::get('userregister', [AdminController::class, 'register']);
Route::post('register_user', [AdminController::class, 'registersubmit']);

// Route::get('admin', [AdminController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);  // /admin route is now for the dashboard
    // You can add other authenticated routes here
});
Route::get('/logout', [AdminController::class, 'logout']);

Route::get('students', [StudentsDashboardController::class, 'index']);
Route::post('students_import', [StudentsDashboardController::class, 'import']);

Route::get('add_students', [StudentsDashboardController::class, 'student_form']);
Route::post('addstudents', [StudentsDashboardController::class, 'addStudent']);
Route::get('/students_edit/{id}', [StudentsDashboardController::class, 'editstudents']);
Route::post('/update_student/{id}', [StudentsDashboardController::class, 'updatestudent']);
Route::get('/students_delete/{id}', [StudentsDashboardController::class, 'delete']);

Route::get('adddonor', [DonorDashboardController::class, 'donor_form']);
Route::post('add_donor', [DonorDashboardController::class, 'adddonors']);
Route::get('donor_list', [DonorDashboardController::class, 'index']);
Route::get('donors_edit/{id}', [DonorDashboardController::class, 'edit']);
Route::post('update_donor/{id}', [DonorDashboardController::class, 'update']);
Route::get('donors_delete/{id}', [DonorDashboardController::class, 'delete']);

