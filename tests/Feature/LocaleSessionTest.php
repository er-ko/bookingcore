<?php

use App\Models\Identity\UserIdentitySettings;
use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

beforeEach(function (): void {
    Schema::dropIfExists('user_identity_settings');
    Schema::dropIfExists('integration_calendar_settings');
    Schema::dropIfExists('integrations');
    Schema::dropIfExists('users');
    Schema::dropIfExists('languages');

    Schema::create('languages', function (Blueprint $table): void {
        $table->id();
        $table->string('language_tag', 16)->unique();
        $table->char('iso_alpha3', 3)->nullable()->unique();
        $table->string('name', 64);
        $table->string('local_name', 64);
        $table->string('flag_emoji', 16)->nullable();
        $table->string('flag_icon', 64)->nullable();
        $table->string('date_format', 32);
        $table->string('time_format', 32);
        $table->string('datetime_format', 32);
        $table->string('hour_cycle', 2)->default('24');
        $table->string('decimal_separator', 4)->default('.');
        $table->string('thousands_separator', 8)->default(',');
        $table->boolean('is_active')->default(true);
        $table->timestamps();
    });

    Schema::create('users', function (Blueprint $table): void {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password');
        $table->rememberToken();
        $table->timestamps();
    });

    Schema::create('user_identity_settings', function (Blueprint $table): void {
        $table->id();
        $table->foreignId('user_id');
        $table->string('mode', 32)->default('services');
        $table->string('brand_name', 160);
        $table->string('slug', 120)->unique();
        $table->string('default_language_code', 16)->nullable();
        $table->char('default_currency_code', 3)->nullable();
        $table->char('default_country_code', 2)->nullable();
        $table->boolean('is_public')->default(true);
        $table->timestamps();
    });

    Schema::create('integrations', function (Blueprint $table): void {
        $table->id();
        $table->foreignId('user_id');
        $table->string('type');
        $table->string('provider');
        $table->string('provider_account_id')->nullable();
        $table->string('email')->nullable();
        $table->string('name')->nullable();
        $table->text('access_token')->nullable();
        $table->text('refresh_token')->nullable();
        $table->timestamp('token_expires_at')->nullable();
        $table->json('scopes')->nullable();
        $table->json('meta')->nullable();
        $table->boolean('is_active')->default(true);
        $table->boolean('is_primary')->default(false);
        $table->timestamps();
    });

    Schema::create('integration_calendar_settings', function (Blueprint $table): void {
        $table->id();
        $table->foreignId('integration_id');
        $table->string('selected_calendar_id', 191)->nullable();
        $table->timestamps();
    });

    Route::middleware('web')
        ->get('/locale-test/home', fn () => response(app()->getLocale()))
        ->name('locale-test.home');

    Route::middleware('web')
        ->get('/locale-test/@{slug}', fn () => response(app()->getLocale()))
        ->name('public-booking.locale-test');

    Route::middleware('web')
        ->get('/locale-test/shared', fn () => inertia('Locale/Test'))
        ->name('locale-test.shared');

    DB::table('languages')->insert([
        [
            'language_tag' => 'en',
            'iso_alpha3' => 'eng',
            'name' => 'English',
            'local_name' => 'English',
            'flag_emoji' => '🇺🇸',
            'flag_icon' => 'usa.png',
            'date_format' => 'm-d-Y',
            'time_format' => 'h:i a',
            'datetime_format' => 'm-d-Y h:i a',
            'hour_cycle' => '12',
            'decimal_separator' => '.',
            'thousands_separator' => ',',
            'is_active' => true,
        ],
        [
            'language_tag' => 'es',
            'iso_alpha3' => 'spa',
            'name' => 'Spanish',
            'local_name' => 'Español',
            'flag_emoji' => '🇪🇸',
            'flag_icon' => 'spain.png',
            'date_format' => 'd/m/Y',
            'time_format' => 'H:i',
            'datetime_format' => 'd/m/Y H:i',
            'hour_cycle' => '24',
            'decimal_separator' => ',',
            'thousands_separator' => '.',
            'is_active' => true,
        ],
        [
            'language_tag' => 'fr',
            'iso_alpha3' => 'fra',
            'name' => 'French',
            'local_name' => 'Français',
            'flag_emoji' => '🇫🇷',
            'flag_icon' => 'france.png',
            'date_format' => 'd/m/Y',
            'time_format' => 'H:i',
            'datetime_format' => 'd/m/Y H:i',
            'hour_cycle' => '24',
            'decimal_separator' => ',',
            'thousands_separator' => ' ',
            'is_active' => false,
        ],
    ]);
});

it('seeds generic public pages from the browser language when no session locale exists', function (): void {
    $this
        ->withHeader('Accept-Language', 'es-ES,es;q=0.9,en;q=0.8')
        ->get('/locale-test/home')
        ->assertOk()
        ->assertSeeText('es')
        ->assertSessionHas('locale', 'es');
});

it('seeds public booking pages from the owner default language when no session locale exists', function (): void {
    $user = User::factory()->create();

    UserIdentitySettings::query()->create([
        'user_id' => $user->id,
        'brand_name' => 'Casa Reserva',
        'slug' => 'casa-reserva',
        'default_language_code' => 'es',
        'default_currency_code' => 'EUR',
        'default_country_code' => 'ES',
        'is_public' => true,
    ]);

    $this
        ->withHeader('Accept-Language', 'en-US,en;q=0.9')
        ->get('/locale-test/@casa-reserva')
        ->assertOk()
        ->assertSeeText('es')
        ->assertSessionHas('locale', 'es');
});

it('uses the public booking owner default language before the existing session locale', function (): void {
    $user = User::factory()->create();

    UserIdentitySettings::query()->create([
        'user_id' => $user->id,
        'brand_name' => 'Casa Reserva',
        'slug' => 'session-wins',
        'default_language_code' => 'es',
        'default_currency_code' => 'EUR',
        'default_country_code' => 'ES',
        'is_public' => true,
    ]);

    $this
        ->withSession(['locale' => 'en'])
        ->withHeader('Accept-Language', 'es-ES,es;q=0.9')
        ->get('/locale-test/@session-wins')
        ->assertOk()
        ->assertSeeText('es')
        ->assertSessionHas('locale', 'es');
});

it('uses the authenticated administration default language before the existing session locale', function (): void {
    $user = User::factory()->create();

    UserIdentitySettings::query()->create([
        'user_id' => $user->id,
        'brand_name' => 'Casa Reserva',
        'slug' => 'admin-language',
        'default_language_code' => 'es',
        'default_currency_code' => 'EUR',
        'default_country_code' => 'ES',
        'is_public' => true,
    ]);

    $this
        ->actingAs($user)
        ->withSession(['locale' => 'en'])
        ->get('/locale-test/home')
        ->assertOk()
        ->assertSeeText('es')
        ->assertSessionHas('locale', 'es');
});

it('updates the current session locale manually', function (): void {
    $this
        ->withSession(['locale' => 'en'])
        ->from('/locale-test/home')
        ->post(route('locale.update'), [
            'locale' => 'es',
        ])
        ->assertRedirect('/locale-test/home')
        ->assertSessionHas('locale', 'es');
});

it('rejects unsupported manual locale changes', function (): void {
    $this
        ->withSession(['locale' => 'en'])
        ->from('/locale-test/home')
        ->post(route('locale.update'), [
            'locale' => 'zz',
        ])
        ->assertRedirect('/locale-test/home')
        ->assertSessionHasErrors('locale')
        ->assertSessionHas('locale', 'en');
});

it('shares active locale options from the database', function (): void {
    $this
        ->withSession(['locale' => 'es'])
        ->get('/locale-test/shared')
        ->assertOk()
        ->assertInertia(fn ($page) => $page
            ->where('locale.current', 'es')
            ->where('locale.supported.en.name', 'English')
            ->where('locale.supported.es.local_name', 'Español')
            ->where('locale.supported.es.flag_icon', 'spain.png')
            ->missing('locale.supported.fr')
        );
});
