<?php

use App\Http\Controllers\Dashboard\Api\{
    BookingOptionsController,
};
use App\Http\Controllers\Branch\Api\{
    BranchOptionsController,
};
use Illuminate\Support\Facades\Route;

Route::middleware('auth')
    ->group(function () {

    Route::prefix('booking-options')
        ->name('api.booking-options.')
        ->group(function () {

        Route::get('/units', [BookingOptionsController::class, 'units'])->name('units');
        Route::get('/activities', [BookingOptionsController::class, 'activities'])->name('activities');
        Route::get('/slots', [BookingOptionsController::class, 'slots'])->name('slots');

    });

    Route::prefix('branch-options')
        ->name('api.branch-options.')
        ->group(function () {

        Route::get('/timezones', [BranchOptionsController::class, 'timezones'])->name('timezones');

    });

});