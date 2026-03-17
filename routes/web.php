<?php

use App\Http\Controllers\Booking\Web\{
    BookingPageController
};
use Illuminate\Support\Facades\Route;

Route::middleware('auth')
    ->prefix('bookings')
    ->name('bookings.')
    ->group(function () {

        Route::get('/', [BookingPageController::class, 'index'])->name('index');
        Route::get('/create', [BookingPageController::class, 'create'])->name('create');

});