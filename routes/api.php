<?php

use App\Http\Controllers\Booking\Api\{
    CreateBookingController,
    CancelBookingController,
    UpdateBookingStatusController,
    BookingOptionsController
};
use Illuminate\Support\Facades\Route;

Route::prefix('bookings')
    ->name('api.bookings.')
    ->group(function () {

    Route::post('/create', CreateBookingController::class)->name('store');
    Route::post('/{booking}/cancel', CancelBookingController::class)->name('cancel');
    Route::patch('/{booking}/status', UpdateBookingStatusController::class)->name('status');

});

Route::prefix('booking-options')
    ->name('api.booking-options.')
    ->group(function () {

    Route::get('/resources', [BookingOptionsController::class, 'resources'])->name('resources');
    Route::get('/activities', [BookingOptionsController::class, 'activities'])->name('activities');
    Route::get('/slots', [BookingOptionsController::class, 'slots'])->name('slots');

});