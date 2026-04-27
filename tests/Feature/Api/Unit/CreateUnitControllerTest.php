<?php

use App\Enums\IntegrationProvider;
use App\Enums\IntegrationType;
use App\Models\Branch;
use App\Models\Identity\UserIdentitySettings;
use App\Models\Integration\Integration;
use App\Models\Integration\IntegrationCalendarSetting;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

uses(RefreshDatabase::class);

it('creates a unit through the API', function () {
    // Arrange
    $user = createOnboardedUnitCreateUser();
    $branch = createUnitTestBranch($user->id);

    $payload = createUnitPayload(
        branchId: $branch->id,
        name: 'Chair A',
        description: 'Arrive 10 min. before.',
        isActive: true,
    );

    // Act
    $response = $this
        ->actingAs($user)
        ->post(route('units.store'), $payload);

    // Assert
    $response
        ->assertRedirect(route('units.index'))
        ->assertSessionHas('success', __('unit.messages.created'));

    $this->assertDatabaseCount('units', 1);

    $this->assertDatabaseHas('units', [
        'user_id' => $user->id,
        'branch_id' => $branch->id,
        'name' => 'Chair A',
        'description' => 'Arrive 10 min. before.',
        'is_active' => true,
    ]);

    expect(Unit::first()?->public_id)->not->toBeEmpty();
});

it('returns a validation error when required data are missing', function () {
    // Arrange
    $user = createOnboardedUnitCreateUser();

    // Act
    $response = $this
        ->from(route('units.create'))
        ->actingAs($user)
        ->post(route('units.store'), []);

    // Assert
    $response
        ->assertRedirect(route('units.create'))
        ->assertSessionHasErrors([
            'branch_id',
            'name',
            'is_active',
        ]);
});

it('returns a validation error when branch does not exist', function () {
    // Arrange
    $user = createOnboardedUnitCreateUser();

    $payload = createUnitPayload(
        branchId: 999999,
        name: 'Chair A',
        description: 'Test description',
        isActive: true,
    );

    // Act
    $response = $this
        ->from(route('units.create'))
        ->actingAs($user)
        ->post(route('units.store'), $payload);

    // Assert
    $response
        ->assertRedirect(route('units.create'))
        ->assertSessionHasErrors([
            'branch_id',
        ]);
});

/**
 * Create a branch for unit API tests.
 */
function createUnitTestBranch(int $userId, array $attributes = []): Branch
{
    return Branch::create(array_merge([
        'user_id' => $userId,
        'public_id' => 'br_' . Str::random(10),
        'name' => 'Brno',
        'address_line_1' => 'Street 1',
        'address_line_2' => 'Street 2',
        'city' => 'City',
        'postcode' => '10000',
        'country_code' => 'CZ',
        'timezone' => 'Europe/Prague',
        'is_active' => true,
    ], $attributes));
}

function createOnboardedUnitCreateUser(): User
{
    $user = User::factory()->create();

    UserIdentitySettings::create([
        'user_id' => $user->id,
        'brand_name' => 'Test Brand',
        'slug' => 'test-' . Str::random(8),
        'default_language_code' => 'en',
        'default_currency_code' => 'USD',
        'default_country_code' => 'US',
        'is_public' => true,
    ]);

    $integration = Integration::create([
        'user_id' => $user->id,
        'type' => IntegrationType::Calendar->value,
        'provider' => IntegrationProvider::Google->value,
        'provider_account_id' => 'google-' . Str::random(8),
        'email' => $user->email,
        'name' => $user->name,
        'access_token' => 'test-access-token',
        'refresh_token' => 'test-refresh-token',
        'token_expires_at' => now()->addHour(),
        'scopes' => ['https://www.googleapis.com/auth/calendar'],
        'is_active' => true,
        'is_primary' => true,
    ]);

    IntegrationCalendarSetting::create([
        'integration_id' => $integration->id,
        'selected_calendar_id' => 'test-calendar@group.calendar.google.com',
        'sync_mode' => 'soft',
    ]);

    return $user->fresh();
}

/**
 * Create a unit API payload for tests.
 *
 * @return array<string, mixed>
 */
function createUnitPayload(
    int $branchId,
    string $name,
    ?string $description,
    bool $isActive,
): array {
    return [
        'branch_id' => $branchId,
        'name' => $name,
        'description' => $description,
        'is_active' => $isActive,
    ];
}
