<?php

use App\Http\Controllers\Integration\Web\{
    GoogleCalendarConnectController,
    IntegrationCalendarPageController,
    SelectIntegrationCalendarController,
};
use Illuminate\Support\Facades\Route;

Route::middleware('auth')
    ->prefix('integrations/calendar')
    ->name('integrations.calendar.')
    ->group(function () {
        Route::get('/', IntegrationCalendarPageController::class)->name('index');
        Route::get('/google', [GoogleCalendarConnectController::class, 'redirect'])->name('google.redirect');
        Route::get('/google/callback', [GoogleCalendarConnectController::class, 'callback'])->name('google.callback');
        Route::post('/{integration}/select', SelectIntegrationCalendarController::class)->name('select');
    });