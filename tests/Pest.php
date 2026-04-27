<?php

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "pest()" function to bind a different classes or traits.
|
*/

pest()->extend(Tests\TestCase::class)
 // ->use(Illuminate\Foundation\Testing\RefreshDatabase::class)
    ->in('Feature');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

function something()
{
    // ..
}

function createOnboardedUser(): \App\Models\User
{
    $user = \App\Models\User::factory()->create();

    \App\Models\Identity\UserIdentitySettings::create([
        'user_id' => $user->id,
        'brand_name' => 'Test Brand',
        'slug' => 'test-' . \Illuminate\Support\Str::random(8),
        'default_language_code' => 'en',
        'default_currency_code' => 'USD',
        'default_country_code' => 'US',
        'is_public' => true,
    ]);

    $integration = \App\Models\Integration\Integration::create([
        'user_id' => $user->id,
        'type' => \App\Enums\IntegrationType::Calendar->value,
        'provider' => \App\Enums\IntegrationProvider::Google->value,
        'provider_account_id' => 'google-' . \Illuminate\Support\Str::random(8),
        'email' => $user->email,
        'name' => $user->name,
        'access_token' => 'test-access-token',
        'refresh_token' => 'test-refresh-token',
        'token_expires_at' => now()->addHour(),
        'scopes' => ['https://www.googleapis.com/auth/calendar'],
        'is_active' => true,
        'is_primary' => true,
    ]);

    \App\Models\Integration\IntegrationCalendarSetting::create([
        'integration_id' => $integration->id,
        'selected_calendar_id' => 'test-calendar@group.calendar.google.com',
        'sync_mode' => 'soft',
    ]);

    return $user->fresh();
}
