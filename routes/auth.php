<?php

use App\Http\Controllers\Auth\Web\{
    ConnectPageController,
    GoogleAuthController,
    LogoutController
};
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {

    Route::prefix('connect')
        ->name('connect.')
        ->group(function () {

            Route::get('/', ConnectPageController::class)->name('index');
            Route::get('/google', [GoogleAuthController::class, 'redirect'])->name('google.redirect');
            Route::get('/google/callback', [GoogleAuthController::class, 'callback'])->name('google.callback');
    });

});

Route::middleware('auth')->group(function () {
    Route::post('/logout', LogoutController::class)->name('logout');
});