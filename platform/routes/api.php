<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProfileController;

/*

Route::group([
    'prefix'     => 'api/v1',
    'as'         => 'api.',
    'namespace'  => 'Api\\v1',
    'middleware' => 'bindings',
], function () {

*/

/** Guest routes */
Route::group(['middleware' => 'guest:sanctum'], function () {
    Route::name('auth.')->group(function () {
        Route::post('login', [AuthController::class, 'login'])->name('login');
        Route::post('registration', [AuthController::class, 'registration'])->name('registration');
    });
});

/** Protected routes */
Route::group([
    'middleware' => 'auth:sanctum',
    'prefix' => 'games',
    'as'   => 'games.',
], function () {
    Route::get('/', [\App\Http\Controllers\Api\GameController::class, 'index'])->name('index');
    Route::group(['prefix' => '{id}'], function () {
        Route::get('/', [\App\Http\Controllers\Api\GameController::class, 'show'])->name('show');
    });
});

Route::group([
    'middleware' => 'auth:sanctum',
    'prefix' => 'users',
    'as'   => 'users.games.',
], function () {
    Route::group(['prefix' => '{id}'], function () {
        Route::get('/games', [\App\Http\Controllers\Api\GameUserController::class, 'games'])->name('games');
        Route::post('/attach', [\App\Http\Controllers\Api\GameUserController::class, 'attach'])->name('attach');
        Route::post('/detach', [\App\Http\Controllers\Api\GameUserController::class, 'detach'])->name('detach');
    });
});

Route::get('logout', [AuthController::class, 'logout'])->name('logout_user');
Route::get('profile', [ProfileController::class, 'show'])->name('profile_user');

Route::resource('user', UserController::class)->only(['store']);
