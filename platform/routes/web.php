<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/** Guest routes */
Route::group(['middleware' => 'guest:sanctum'], function () {
    Route::name('auth.')->group(function () {
        Route::get('/registration', [AuthController::class, 'registration'])->name('registration');
        Route::get('/login', [AuthController::class, 'login'])->name('login');
    });
    Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

});

/** Protected routes */
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::name('game.')->group(function () {
        Route::get('/games', [\App\Http\Controllers\GameController::class, 'index'])->name('index');
        Route::get('/games/{id}', [\App\Http\Controllers\GameController::class, 'show'])->name('show');
    });

    Route::get('/settings', [\App\Http\Controllers\SettingsController::class, 'index'])->name('index');


    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
