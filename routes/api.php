<?php

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

Route::prefix('user')->group(function () {

});
