<?php

use App\Http\Controllers\Booking\Web\BookingPageController;
use App\Http\Controllers\Branch\Api\{
    DeleteBranchController,
    StoreBranchController,
    UpdateBranchController,
};
use App\Http\Controllers\Branch\Web\BranchPageController;
use App\Http\Controllers\Region\Web\{
    CountryPageController,
};
use App\Http\Controllers\Unit\Web\UnitPageController;
use App\Http\Controllers\Unit\Api\{
    DeleteUnitController,
    StoreUnitController,
    UpdateUnitController,
};
use App\Http\Controllers\Activity\Web\ActivityPageController;
use App\Http\Controllers\Activity\Api\{
    DeleteActivityController,
    StoreActivityController,
    UpdateActivityController,
};
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::prefix('bookings')
        ->name('bookings.')
        ->group(function () {
            Route::get('/', [BookingPageController::class, 'index'])->name('index');
            Route::get('/create', [BookingPageController::class, 'create'])->name('create');
        });

    /* Branches */
    Route::prefix('branches')
        ->name('branches.')
        ->group(function () {
            Route::get('/', [BranchPageController::class, 'index'])->name('index');
            Route::get('/create', [BranchPageController::class, 'create'])->name('create');
            Route::get('/{branch}/edit', [BranchPageController::class, 'edit'])->name('edit');
        });

    Route::prefix('api/branches')
        ->name('api.branches.')
        ->group(function () {
            Route::post('/', StoreBranchController::class)->name('store');
            Route::patch('/{branch}', UpdateBranchController::class)->name('update');
            Route::delete('/{branch}', DeleteBranchController::class)->name('destroy');
        });

    /* Units */
    Route::prefix('units')
        ->name('units.')
        ->group(function () {
            Route::get('/', [UnitPageController::class, 'index'])->name('index');
            Route::get('/create', [UnitPageController::class, 'create'])->name('create');
            Route::get('/{unit}/edit', [UnitPageController::class, 'edit'])->name('edit');
        });

    Route::prefix('api/units')
        ->name('api.units.')
        ->group(function () {
            Route::post('/', StoreUnitController::class)->name('store');
            Route::patch('/{unit}', UpdateUnitController::class)->name('update');
            Route::delete('/{unit}', DeleteUnitController::class)->name('destroy');
        });

    /* Activities */
    Route::prefix('activities')
        ->name('activities.')
        ->group(function () {
            Route::get('/', [ActivityPageController::class, 'index'])->name('index');
            Route::get('/create', [ActivityPageController::class, 'create'])->name('create');
            Route::get('/{activity}/edit', [ActivityPageController::class, 'edit'])->name('edit');
        });

    Route::prefix('api/activities')
        ->name('api.activities.')
        ->group(function () {
            Route::post('/', StoreActivityController::class)->name('store');
            Route::patch('/{activity}', UpdateActivityController::class)->name('update');
            Route::delete('/{activity}', DeleteActivityController::class)->name('destroy');
        });

    /* Countries */
    Route::prefix('region/countries')
        ->name('region.countries.')
        ->group(function () {
            Route::get('/', [CountryPageController::class, 'index'])->name('index');
        });
});