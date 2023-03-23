<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PerformanceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FinancesController;
use App\Http\Controllers\AuctionController;
use App\Http\Controllers\Api\BankController;

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

Route::group(['middleware' => 'guest:sanctum'], function () {
    Route::name('auth.')->group(function () {
        Route::get('/registration', [AuthController::class, 'registration'])->name('registration');
        Route::get('/login', [AuthController::class, 'login'])->name('login');
    });


    Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/performances', [PerformanceController::class, 'index'])->name('performances');
    Route::get('/performances/create', [PerformanceController::class, 'create'])->name('performance.create');

    Route::get('/finances', [FinancesController::class, 'index'])->name('finances');
    Route::get('/auction', [AuctionController::class, 'index'])->name('auction');
});
