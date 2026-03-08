<?php

use App\Http\Controllers\Web\Booking\{
    BookingPageController
};
use Illuminate\Support\Facades\Route;

Route::prefix('bookings')
    ->name('bookings.')
    ->group(function () {

    Route::get('/', [BookingPageController::class, 'index'])->name('index');
    Route::get('/create', [BookingPageController::class, 'create'])->name('create');

});