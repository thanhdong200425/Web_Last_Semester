<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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

Route::prefix('admin')->group(function() {
    Route::get('/', [AuthController::class, 'show_form'])->name('sign-in');
    Route::post('/', [AuthController::class, 'authentiacte'])->name('auth.sign-in');
    Route::get('/sign-up', [AuthController::class, 'show_form_sign_up'])->name('sign-up');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});