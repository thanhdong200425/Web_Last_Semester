<?php

use App\Http\Controllers\API\AlbumnController;
use App\Http\Controllers\API\SongController;
use App\Http\Controllers\API\UserController;
use App\Models\Albumn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/', [UserController::class, 'sign_in'])->name('sign_in');

Route::post('/sign_up', [UserController::class, 'sign_up'])->name('sign_up');

Route::post('/sign_out', [UserController::class, 'sign_out'])->name('sign_out');

Route::prefix('/{id}')->group(function () {

    // Update information of a user
    Route::patch('/update', [UserController::class, 'update'])->name('update');

    // Display the information of a user
    Route::get('/display', [UserController::class, 'show']);
});

Route::prefix('/albumn')->middleware('authenticate_user')->group(function () {
    // Route::prefix('/albumn')->group(function () {    
    // Get all the information of all albumns that include "songs", "singers", "albumn name" 
    Route::get('/', [AlbumnController::class, 'index']);

    // Add exist song into an albumn
    Route::post('/{albumn_id}/add_song', [AlbumnController::class, 'addSong'])->name('albumn.addSong');

    // Get all the information of an albumn that include "songs", "singers", "albumn name" 
    Route::get('/{albumn_id}', [AlbumnController::class, 'show']);

    
});





// Route::get('/albumn/{id}', [AlbumnController::class, 'show'])->name('albumn.show');

// Route::get('/create_albumn', [AlbumnController::class, 'store'])->name('albumn.store');

// Route::get('/songs', [UserController::class, 'get']);

// Route::put('/update_albumn/{id}', [AlbumnController::class, 'update'])->name('albumn.update');

// Route::delete('/delete_albumn/{id}', [AlbumnController::class, 'destroy'])->name('albumn.destroy');


// // CRUD song
// Route::get('/songs', [SongController::class, 'index'])->name('song.index');

// Route::get('/song/{id}', [SongController::class, 'show'])->name('song.show');

// Route::get('/create_song', [SongController::class, 'store'])->name('song.store');

// Route::put('/update_song/{id}', [SongController::class, 'update'])->name('song.update');

// Route::delete('/delete_song/{id}', [SongController::class, 'destroy'])->name('song.destroy');




