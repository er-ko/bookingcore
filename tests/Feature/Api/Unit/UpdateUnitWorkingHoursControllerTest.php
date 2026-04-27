<?php

use App\Enums\IntegrationProvider;
use App\Enums\IntegrationType;
use App\Models\Booking\WorkingHour;
use App\Models\Branch;
use App\Models\Identity\UserIdentitySettings;
use App\Models\Integration\Integration;
use App\Models\Integration\IntegrationCalendarSetting;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

uses(RefreshDatabase::class);

it('replaces working hours for a unit', function () {
    // Arrange
    $user = createOnboardedWorkingHoursUser();
    $branch = createWorkingHoursTestBranch($user->id);
    $unit = createWorkingHoursTestUnit($user->id, $branch->id);

    $payload = ['days' => createFullWeekPayload()];

    // Act
    $response = $this
        ->actingAs($user)
        ->putJson(route('units.working-hours.update', $unit->public_id), $payload);

    // Assert
    $response->assertOk()->assertJson(['message' => __('unit.messages.working_hours_updated')]);

    $this->assertDatabaseCount('working_hours', 7);

    $this->assertDatabaseHas('working_hours', [
        'unit_id' => $unit->id,
        'day_of_week' => 1,
        'start_time' => '09:00:00',
        'end_time' => '17:00:00',
        'is_active' => true,
    ]);
});

it('deletes existing working hours and replaces them with new ones', function () {
    // Arrange
    $user = createOnboardedWorkingHoursUser();
    $branch = createWorkingHoursTestBranch($user->id);
    $unit = createWorkingHoursTestUnit($user->id, $branch->id);

    WorkingHour::create([
        'unit_id' => $unit->id,
        'day_of_week' => 1,
        'start_time' => '08:00:00',
        'end_time' => '16:00:00',
        'is_active' => true,
    ]);

    $this->assertDatabaseCount('working_hours', 1);

    $payload = ['days' => createFullWeekPayload()];

    // Act
    $response = $this
        ->actingAs($user)
        ->putJson(route('units.working-hours.update', $unit->public_id), $payload);

    // Assert
    $response->assertOk();

    $this->assertDatabaseCount('working_hours', 7);

    $this->assertDatabaseMissing('working_hours', [
        'unit_id' => $unit->id,
        'start_time' => '08:00:00',
    ]);
});

it('stores inactive working hours correctly', function () {
    // Arrange
    $user = createOnboardedWorkingHoursUser();
    $branch = createWorkingHoursTestBranch($user->id);
    $unit = createWorkingHoursTestUnit($user->id, $branch->id);

    $days = createFullWeekPayload(isActive: false);

    // Act
    $response = $this
        ->actingAs($user)
        ->putJson(route('units.working-hours.update', $unit->public_id), ['days' => $days]);

    // Assert
    $response->assertOk();

    $this->assertDatabaseHas('working_hours', [
        'unit_id' => $unit->id,
        'day_of_week' => 1,
        'is_active' => false,
    ]);
});

it('returns a validation error when days array does not contain all 7 days', function () {
    // Arrange
    $user = createOnboardedWorkingHoursUser();
    $branch = createWorkingHoursTestBranch($user->id);
    $unit = createWorkingHoursTestUnit($user->id, $branch->id);

    $incompleteDays = [
        1 => [['day_of_week' => 1, 'start_time' => '09:00', 'end_time' => '17:00', 'is_active' => true]],
    ];

    // Act
    $response = $this
        ->actingAs($user)
        ->putJson(route('units.working-hours.update', $unit->public_id), ['days' => $incompleteDays]);

    // Assert
    $response->assertUnprocessable()->assertJsonValidationErrors(['days']);
});

it('returns a validation error when days is missing', function () {
    // Arrange
    $user = createOnboardedWorkingHoursUser();
    $branch = createWorkingHoursTestBranch($user->id);
    $unit = createWorkingHoursTestUnit($user->id, $branch->id);

    // Act
    $response = $this
        ->actingAs($user)
        ->putJson(route('units.working-hours.update', $unit->public_id), []);

    // Assert
    $response->assertUnprocessable()->assertJsonValidationErrors(['days']);
});

it('returns a validation error when end time is before start time', function () {
    // Arrange
    $user = createOnboardedWorkingHoursUser();
    $branch = createWorkingHoursTestBranch($user->id);
    $unit = createWorkingHoursTestUnit($user->id, $branch->id);

    $days = createFullWeekPayload();
    $days[1] = [['day_of_week' => 1, 'start_time' => '17:00', 'end_time' => '09:00', 'is_active' => true]];

    // Act
    $response = $this
        ->actingAs($user)
        ->putJson(route('units.working-hours.update', $unit->public_id), ['days' => $days]);

    // Assert
    $response->assertUnprocessable();
});

it('returns not found when unit does not exist', function () {
    // Arrange
    $user = createOnboardedWorkingHoursUser();

    $payload = ['days' => createFullWeekPayload()];

    // Act
    $response = $this
        ->actingAs($user)
        ->putJson(route('units.working-hours.update', 'un_nonexistent'), $payload);

    // Assert
    $response->assertNotFound();
});

it('returns not found when unit belongs to another user', function () {
    // Arrange
    $user = createOnboardedWorkingHoursUser();
    $otherUser = createOnboardedWorkingHoursUser();

    $branch = createWorkingHoursTestBranch($otherUser->id);
    $unit = createWorkingHoursTestUnit($otherUser->id, $branch->id);

    $payload = ['days' => createFullWeekPayload()];

    // Act
    $response = $this
        ->actingAs($user)
        ->putJson(route('units.working-hours.update', $unit->public_id), $payload);

    // Assert
    $response->assertNotFound();
});

/**
 * Create a branch for working hours tests.
 */
function createWorkingHoursTestBranch(int $userId): Branch
{
    return Branch::create([
        'user_id' => $userId,
        'public_id' => 'br_' . Str::random(10),
        'name' => 'Branch',
        'address_line_1' => 'Street 1',
        'address_line_2' => null,
        'city' => 'City',
        'postcode' => '10000',
        'country_code' => 'CZ',
        'timezone' => 'Europe/Prague',
        'is_active' => true,
    ]);
}

/**
 * Create a fully onboarded user for working hours tests.
 */
function createOnboardedWorkingHoursUser(): User
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
 * Create a unit for working hours tests.
 */
function createWorkingHoursTestUnit(int $userId, int $branchId): Unit
{
    return Unit::create([
        'user_id' => $userId,
        'public_id' => 'un_' . Str::random(10),
        'branch_id' => $branchId,
        'name' => 'Chair A',
        'description' => 'Description',
        'is_active' => true,
    ]);
}

/**
 * Create a full 7-day working hours payload.
 *
 * @return array<int, array<int, array<string, mixed>>>
 */
function createFullWeekPayload(bool $isActive = true): array
{
    $days = [];

    foreach (range(1, 7) as $day) {
        $days[$day] = [
            [
                'day_of_week' => $day,
                'start_time' => '09:00',
                'end_time' => '17:00',
                'is_active' => $isActive,
            ],
        ];
    }

    return $days;
}
