<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\SingerController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlbumnController;
use App\Http\Controllers\SearchController;
use App\Http\Middleware\CheckUserIsActive;
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
Route::get('/', [AuthController::class, 'show_form'])->middleware('is_remember_user')->name('sign-in');
Route::post('/', [AuthController::class, 'authenticate'])->middleware('check_user_is_active')->name('auth.sign-in');
Route::get('/sign-up', [SignUpController::class, 'index'])->name('sign-up');
Route::post('/sign-up', [SignUpController::class, 'store'])->name('sign-up.store');

Route::prefix('admin')->middleware(['is_login'])->group(function () {
    // Dashboard routes
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::delete('/dashboard/delete/{singer_id}', [DashboardController::class, 'delete'])->name('dashboard.delete-singer');

    // Manage user routes
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::delete('/users/delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/edit/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('users/show/{id}', [UserController::class, 'show'])->name('users.show');

    // Create user routes
    Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/users/create', [UserController::class, 'store'])->name('user.store');

    // Add song routes
    Route::get('/songs/create', [SongController::class, 'create'])->name('song.create');
    Route::post('/songs/create', [SongController::class, 'store'])->name('song.store');

    // Manage song routes
    Route::get('songs', [SongController::class, 'index'])->name('songs');
    Route::delete('songs/delete/{song_id}', [SongController::class, 'destroy'])->name('song.destroy');
    Route::get('songs/edit/{song_id}', [SongController::class, 'edit'])->name('song.edit');
    Route::put('songs/edit/{song_id}', [SongController::class, 'update'])->name('song.update');

    // Add singer routes
    Route::get('/singers/create', [SingerController::class, 'create'])->name('singer.create');
    Route::post('/singers/create', [SingerController::class, 'store'])->name('singer.store');

    // Manage singer routes
    Route::get('/singers', [SingerController::class, 'index'])->name('singers');
    Route::get('/singers/edit/{singer_id}', [SingerController::class, 'edit'])->name('singer.edit');
    Route::put('/singers/eidt/{singer_id}', [SingerController::class, 'update'])->name('singer.update');
    Route::delete('/singers/delete/{singer_id}', [SingerController::class, 'destroy'])->name('singer.delete');

    // Add album routes
    Route::get('/albumns/create', [AlbumnController::class, 'create'])->name('albumn.create');
    Route::post('/albumns/create', [AlbumnController::class, 'store'])->name('albumn.store');

    // Manage albums routes
    Route::get('/albumns', [AlbumnController::class, 'index'])->name('albumns');
    Route::delete('/albumns/delete/{albumn_id}', [AlbumnController::class, 'destroy'])->name('albumn.delete');
    Route::get('/albumns/edit/{albumn_id}', [AlbumnController::class, 'edit'])->name('albumn.edit');
    Route::put('/albumns/edit/{albumn_id}', [AlbumnController::class, 'update'])->name('albumn.update');

    // Logout routes
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // Profile routes
    Route::get('/profile/my', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile/my', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/my/update-image', [ProfileController::class, 'updateImage'])->name('profile.update-image');

    // Search routes
    Route::get('/dashboard/search/', [SearchController::class, 'search'])->name('search');
    
});

//TODO: Doing add data into music-player (dynamic)
