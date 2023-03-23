<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\PerformanceController;
use App\Http\Controllers\Api\BillController;
use App\Http\Controllers\Api\BankController;

Route::group(['middleware' => 'guest:sanctum'], function () {
    Route::name('auth.')->group(function () {
        Route::post('login', [AuthController::class, 'login'])->name('login');
        Route::post('registration', [AuthController::class, 'registration'])->name('registration');
    });
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout_user');
    Route::get('profile', [ProfileController::class, 'show'])->name('profile_user');




    Route::resource('user', UserController::class)->only(['store']);
    Route::resource('performance', PerformanceController::class)->only(['store', 'index']);

    Route::post('bill', [BillController::class, 'store'])->name('api.bill.store');
    Route::get('bill', [BillController::class, 'show'])->name('api.bill.show');
    Route::post('bill/transfer', [BillController::class, 'transfer'])->name('api.bill.transfer');

    Route::get('banks', [BankController::class, 'index'])->name('api.banks.index');


});



// User section




