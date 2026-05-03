<?php

use App\Http\Controllers\Activity\Web\{
    ActivityPageController,
    DeleteActivityController,
    StoreActivityController,
    UpdateActivityController,
};
use App\Http\Controllers\Branch\Web\{
    BranchPageController,
    DeleteBranchController,
    StoreBranchController,
    UpdateBranchController,
};
use App\Http\Controllers\Dashboard\Web\{
    CancelBookingController,
    CreateBookingController,
    DashboardPageController,
    UpdateBookingStatusController,
};
use App\Http\Controllers\Home\Web\HomePageController;
use App\Http\Controllers\Identity\Web\{
    CancelAccountDeletionController,
    IdentityPageController,
    ScheduleAccountDeletionController,
    UpdateIdentityController,
};
use App\Http\Controllers\Legal\Web\LegalPageController;
use App\Http\Controllers\Locale\Web\UpdateLocaleController;
use App\Http\Controllers\PublicBooking\Web\{
    DownloadPublicBookingCalendarController,
    PublicBookingDetailPageController,
    PublicBookingPageController,
    StorePublicBookingController,
};
use App\Http\Controllers\Price\Web\{
    DeletePriceController,
    PricePageController,
    StorePriceController,
    UpdatePriceController,
};
use App\Http\Controllers\Region\Web\{
    CountryPageController,
    CountryStatusController,
    CurrencyPageController,
    CurrencyStatusController,
    LanguagePageController,
    LanguageStatusController,
};
use App\Http\Controllers\Unit\Web\{
    DeleteUnitController,
    StoreUnitController,
    UnitPageController,
    UpdateUnitController,
    UpdateUnitRecurringTimeOffsController,
    UpdateUnitTimeOffsController,
    UpdateUnitWorkingHoursController,
};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public routes
|--------------------------------------------------------------------------
*/
Route::get('/', HomePageController::class)->name('home');
Route::get('/privacy-policy', [LegalPageController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/terms-of-service', [LegalPageController::class, 'termsOfService'])->name('terms-of-service');
Route::post('/locale', UpdateLocaleController::class)->name('locale.update');

Route::prefix('@{slug}')
    ->name('public-booking.')
    ->group(function () {
        Route::get('/', PublicBookingPageController::class)->name('show');
        Route::post('/bookings', StorePublicBookingController::class)->name('store');

        Route::prefix('booking/{token}')
            ->name('booking.')
            ->group(function () {
                Route::get('/', PublicBookingDetailPageController::class)->name('show');
                Route::get('/calendar.ics', DownloadPublicBookingCalendarController::class)->name('calendar');
            });
    });

/*
|--------------------------------------------------------------------------
| Authenticated routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::prefix('identity')
        ->name('identity.')
        ->group(function () {
            Route::get('/', IdentityPageController::class)->name('index');
            Route::patch('/', UpdateIdentityController::class)->name('update');
            Route::post('/schedule-deletion', ScheduleAccountDeletionController::class)->name('schedule-deletion');
            Route::post('/cancel-deletion', CancelAccountDeletionController::class)->name('cancel-deletion');
        });

    Route::middleware('onboarding.completed')->group(function () {
        Route::prefix('dashboard')
            ->name('dashboard.')
            ->group(function () {
                Route::get('/', [DashboardPageController::class, 'index'])->name('index');
                Route::post('/{booking}/cancel', CancelBookingController::class)->name('cancel');
                Route::patch('/{booking}/status', UpdateBookingStatusController::class)->name('status');
            });

        Route::prefix('branches')
            ->name('branches.')
            ->group(function () {
                Route::get('/', [BranchPageController::class, 'index'])->name('index');
                Route::get('/create', [BranchPageController::class, 'create'])->name('create');
                Route::post('/', StoreBranchController::class)->name('store');
                Route::get('/{branch}/edit', [BranchPageController::class, 'edit'])->name('edit');
                Route::patch('/{branch}', UpdateBranchController::class)->name('update');
                Route::delete('/{branch}', DeleteBranchController::class)->name('destroy');
            });

        Route::prefix('units')
            ->name('units.')
            ->group(function () {
                Route::get('/', [UnitPageController::class, 'index'])->name('index');
                Route::get('/create', [UnitPageController::class, 'create'])->name('create');
                Route::post('/', StoreUnitController::class)->name('store');
                Route::get('/{unit}/edit', [UnitPageController::class, 'edit'])->name('edit');
                Route::patch('/{unit}', UpdateUnitController::class)->name('update');
                Route::delete('/{unit}', DeleteUnitController::class)->name('destroy');
                Route::put('/{unit}/working-hours', UpdateUnitWorkingHoursController::class)->name('working-hours.update');
                Route::put('/{unit}/recurring-time-offs', UpdateUnitRecurringTimeOffsController::class)->name('recurring-time-offs.update');
                Route::put('/{unit}/time-offs', UpdateUnitTimeOffsController::class)->name('time-offs.update');
            });

        Route::prefix('activities')
            ->name('activities.')
            ->group(function () {
                Route::get('/', [ActivityPageController::class, 'index'])->name('index');
                Route::get('/create', [ActivityPageController::class, 'create'])->name('create');
                Route::post('/', StoreActivityController::class)->name('store');
                Route::get('/{activity}/edit', [ActivityPageController::class, 'edit'])->name('edit');
                Route::patch('/{activity}', UpdateActivityController::class)->name('update');
                Route::delete('/{activity}', DeleteActivityController::class)->name('destroy');
            });

        Route::prefix('prices')
            ->name('prices.')
            ->group(function () {
                Route::get('/', [PricePageController::class, 'index'])->name('index');
                Route::post('/', StorePriceController::class)->name('store');
                Route::patch('/{price}', UpdatePriceController::class)->name('update');
                Route::delete('/{price}', DeletePriceController::class)->name('destroy');
            });

        Route::prefix('region')
            ->name('region.')
            ->group(function () {
                Route::prefix('countries')
                    ->name('countries.')
                    ->group(function () {
                        Route::get('/', [CountryPageController::class, 'index'])->name('index');
                        Route::patch('/status', CountryStatusController::class)->name('status');
                    });

                Route::prefix('languages')
                    ->name('languages.')
                    ->group(function () {
                        Route::get('/', [LanguagePageController::class, 'index'])->name('index');
                        Route::patch('/status', LanguageStatusController::class)->name('status');
                    });

                Route::prefix('currencies')
                    ->name('currencies.')
                    ->group(function () {
                        Route::get('/', [CurrencyPageController::class, 'index'])->name('index');
                        Route::patch('/status', CurrencyStatusController::class)->name('status');
                    });
            });
    });
});
