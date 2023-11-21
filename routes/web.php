<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::view('/', 'pages.sign-in');

Route::prefix('admin')->group(function() {
    // Auth routes
    Route::get('/', [AuthController::class, 'show_form'])->name('sign-in');
    Route::post('/', [AuthController::class, 'authentiacte'])->name('auth.sign-in');
    Route::get('/sign-up', [AuthController::class, 'show_form_sign_up'])->name('sign-up');

    // Dashboard routes
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::delete('/dashboard/delete/{singer_id}', [DashboardController::class, 'delete'] )->name('dashboard.delete-singer');

    // Manage user routes
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/edit/{id}', [UserController::class, 'update'])->name('users.update');

    // Create user routes
    Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/users/create', [UserController::class, 'store'])->name('user.store');
    
});