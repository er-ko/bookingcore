<?php

use App\Http\Controllers\Webhook\Google\GoogleRiscWebhookController;
use Illuminate\Support\Facades\Route;

Route::post('/webhooks/google/risc', GoogleRiscWebhookController::class)
    ->name('webhooks.google.risc');
