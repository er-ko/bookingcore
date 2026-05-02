<?php

use App\Http\Controllers\Dashboard\Api\{
    BookingOptionsController,
};
use App\Http\Controllers\Branch\Api\{
    BranchOptionsController,
};
use Illuminate\Support\Facades\Route;

Route::prefix('booking-options')
    ->name('api.booking-options.')
    ->middleware('web')
    ->group(function () {

        Route::get('/units', [BookingOptionsController::class, 'units'])->name('units');
        Route::get('/activities', [BookingOptionsController::class, 'activities'])->name('activities');
        Route::get('/slots', [BookingOptionsController::class, 'slots'])->name('slots');

    });

Route::middleware(['web', 'auth'])
    ->group(function () {
        Route::prefix('branch-options')
            ->name('api.branch-options.')
            ->group(function () {

                Route::get('/timezones', [BranchOptionsController::class, 'timezones'])->name('timezones');

            });

    });
