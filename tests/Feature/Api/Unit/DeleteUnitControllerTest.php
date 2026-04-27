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

it('deletes a unit through the API', function () {
    // Arrange
    $user = createOnboardedUnitDeleteUser();
    $branch = createUnitDeleteTestBranch($user->id);

    $unit = createUnitForDeleteTest($user->id, $branch->id, [
        'name' => 'Chair A',
    ]);

    // Act
    $response = $this
        ->actingAs($user)
        ->delete(route('units.destroy', $unit->public_id));

    // Assert
    $response
        ->assertRedirect(route('units.index'))
        ->assertSessionHas('success', __('unit.messages.deleted'));

    $this->assertDatabaseMissing('units', [
        'id' => $unit->id,
    ]);
});

it('returns not found when the unit does not exist', function () {
    // Arrange
    $user = createOnboardedUnitDeleteUser();

    // Act
    $response = $this
        ->actingAs($user)
        ->delete(route('units.destroy', 'un_missing123'));

    // Assert
    $response->assertNotFound();
});

/**
 * Create a branch for delete unit API tests.
 */
function createUnitDeleteTestBranch(int $userId, array $attributes = []): Branch
{
    return Branch::create(array_merge([
        'user_id' => $userId,
        'public_id' => 'br_' . Str::random(10),
        'name' => 'Branch',
        'address_line_1' => 'Street 1',
        'address_line_2' => 'Street 2',
        'city' => 'City',
        'postcode' => '10000',
        'country_code' => 'CZ',
        'timezone' => 'Europe/Prague',
        'is_active' => true,
    ], $attributes));
}

function createOnboardedUnitDeleteUser(): User
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
 * Create a unit for delete unit API tests.
 */
function createUnitForDeleteTest(int $userId, int $branchId, array $attributes = []): Unit
{
    return Unit::create(array_merge([
        'user_id' => $userId,
        'public_id' => 'un_' . Str::random(10),
        'branch_id' => $branchId,
        'name' => 'Chair A',
        'description' => 'Description',
        'is_active' => true,
    ], $attributes));
}
