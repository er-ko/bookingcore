<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::command('accounts:delete-scheduled')->hourly();
Schedule::command('integrations:refresh-expiring-tokens')->everyMinute();
Schedule::command('bookings:cleanup-expired')->hourly();