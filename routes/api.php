<?php

use App\Http\Controllers\Api\AlbumnController;
use App\Http\Controllers\Api\SongController;
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

Route::post('/update/{id}', [UserController::class, 'update'])->name('update');

Route::prefix('user')->group(function () {

});

// CRUD albumn
Route::get('/albumns', [AlbumnController::class, 'index'])->name('albumn.index');

Route::get('/albumn/{id}', [AlbumnController::class, 'show'])->name('albumn.show');

Route::get('/create_albumn', [AlbumnController::class, 'store'])->name('albumn.store');

Route::put('/update_albumn/{id}', [AlbumnController::class, 'update'])->name('albumn.update');

Route::delete('/delete_albumn/{id}', [AlbumnController::class, 'destroy'])->name('albumn.destroy');


// CRUD song
Route::get('/songs', [SongController::class, 'index'])->name('song.index');

Route::get('/song/{id}', [SongController::class, 'show'])->name('song.show');

Route::get('/create_song', [SongController::class, 'store'])->name('song.store');

Route::put('/update_song/{id}', [SongController::class, 'update'])->name('song.update');

Route::delete('/delete_song/{id}', [SongController::class, 'destroy'])->name('song.destroy');

