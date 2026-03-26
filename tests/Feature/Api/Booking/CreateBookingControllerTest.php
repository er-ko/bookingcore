<?php

use App\Enums\BookingStatus;
use App\Models\Activity;
use App\Models\Booking\ActivityAssignment;
use App\Models\Booking\Booking;
use App\Models\Branch;
use App\Models\Customer;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('creates a booking through the API', function () {
    // Arrange
    [$branch, $unit, $activity] = createBookingApiScenario();

    $payload = createBookingPayload(
        branchId: $branch->id,
        unitId: $unit->id,
        activityId: $activity->id,
        startsAt: '2026-03-09 10:00:00',
        note: 'Please call before arrival.',
    );

    // Act
    $response = $this->postJson('/api/bookings/create', $payload);

    // Assert
    $response
        ->assertCreated()
        ->assertJson([
            'message' => 'Booking created successfully.',
        ]);

    $this->assertDatabaseCount('customers', 1);
    $this->assertDatabaseCount('bookings', 1);

    $this->assertDatabaseHas('bookings', [
        'branch_id' => $branch->id,
        'unit_id' => $unit->id,
        'activity_id' => $activity->id,
        'status' => BookingStatus::Pending->value,
        'note' => 'Please call before arrival.',
    ]);
});

it('returns a validation error when required data are missing', function () {
    // Act
    $response = $this->postJson('/api/bookings/create', []);

    // Assert
    $response
        ->assertUnprocessable()
        ->assertJsonValidationErrors([
            'branch_id',
            'unit_id',
            'activity_id',
            'starts_at',
            'customer',
        ]);
});

it('returns a conflict error when the unit is already booked', function () {
    // Arrange
    [$branch, $unit, $activity] = createBookingApiScenario();

    $existingCustomer = createBookingApiCustomer(
        firstName: 'Existing',
        lastName: 'Customer',
        email: 'existingcustomer@email.com',
        phoneCode: '+1',
        phone: '987654321',
    );

    Booking::create([
        'branch_id' => $branch->id,
        'unit_id' => $unit->id,
        'activity_id' => $activity->id,
        'customer_id' => $existingCustomer->id,
        'starts_at' => '2026-03-09 10:00:00',
        'ends_at' => '2026-03-09 11:00:00',
        'status' => BookingStatus::Confirmed,
        'note' => null,
        'confirmed_at' => '2026-03-08 12:00:00',
        'cancelled_at' => null,
    ]);

    $payload = createBookingPayload(
        branchId: $branch->id,
        unitId: $unit->id,
        activityId: $activity->id,
        startsAt: '2026-03-09 10:00:00',
    );

    // Act
    $response = $this->postJson('/api/bookings/create', $payload);

    // Assert
    $response
        ->assertUnprocessable()
        ->assertJson([
            'message' => 'The selected unit is already booked for the given time range.',
        ]);
});

it('returns a slot unavailable error when the activity is not assigned to the unit', function () {
    // Arrange
    $user = User::factory()->create();
    $branch = createBookingApiBranch($user->id);
    $unit = createBookingApiUnit($user->id, $branch->id);
    $activity = createBookingApiActivity($user->id);

    $payload = createBookingPayload(
        branchId: $branch->id,
        unitId: $unit->id,
        activityId: $activity->id,
        startsAt: '2026-03-09 10:00:00',
    );

    // Act
    $response = $this->postJson('/api/bookings/create', $payload);

    // Assert
    $response
        ->assertUnprocessable()
        ->assertJson([
            'message' => 'The selected activity is not assigned to the selected unit.',
        ]);
});

/**
 * Create a complete API booking scenario with branch, unit, activity,
 * and activity assignment.
 *
 * @return array{0: Branch, 1: Unit, 2: Activity}
 */
function createBookingApiScenario(): array
{
    $user = User::factory()->create();
    $branch = createBookingApiBranch($user->id);
    $unit = createBookingApiUnit($user->id, $branch->id);
    $activity = createBookingApiActivity($user->id);

    assignBookingApiActivityToUnit($activity->id, $unit->id);

    return [$branch, $unit, $activity];
}

/**
 * Create a branch for booking API tests.
 */
function createBookingApiBranch(int $userId): Branch
{
    return Branch::create([
        'user_id' => $userId,
        'public_id' => 'br_1234567890',
        'name' => 'Brno',
        'address_line_1' => 'Street 1',
        'address_line_2' => 'Street 2',
        'city' => 'City',
        'postcode' => '10000',
        'country_code' => 'CZ',
        'timezone' => 'Europe/Prague',
        'is_active' => true,
    ]);
}

/**
 * Create a unit for booking API tests.
 */
function createBookingApiUnit(int $userId, int $branchId): Unit
{
    return Unit::create([
        'user_id' => $userId,
        'public_id' => 'un_1234567890',
        'branch_id' => $branchId,
        'name' => 'Chair A',
        'description' => null,
        'is_active' => true,
    ]);
}

/**
 * Create an activity for booking API tests.
 */
function createBookingApiActivity(int $userId): Activity
{
    return Activity::create([
        'user_id' => $userId,
        'public_id' => 'ac_1234567890',
        'name' => 'Consultation',
        'duration_minutes' => 60,
        'buffer_before_minutes' => 10,
        'buffer_after_minutes' => 5,
        'is_active' => true,
    ]);
}

/**
 * Assign an activity to a unit for booking API tests.
 */
function assignBookingApiActivityToUnit(int $activityId, int $unitId): ActivityAssignment
{
    return ActivityAssignment::create([
        'activity_id' => $activityId,
        'unit_id' => $unitId,
    ]);
}

/**
 * Create a customer for booking API tests.
 */
function createBookingApiCustomer(
    string $firstName,
    ?string $lastName,
    string $email,
    ?string $phoneCode,
    ?string $phone,
): Customer {
    return Customer::create([
        'first_name' => $firstName,
        'last_name' => $lastName,
        'email' => $email,
        'phone_code' => $phoneCode,
        'phone' => $phone,
    ]);
}

/**
 * Create a booking API payload for tests.
 *
 * @return array<string, mixed>
 */
function createBookingPayload(
    int $branchId,
    int $unitId,
    int $activityId,
    string $startsAt,
    ?string $note = null,
): array {
    return [
        'branch_id' => $branchId,
        'unit_id' => $unitId,
        'activity_id' => $activityId,
        'starts_at' => $startsAt,
        'customer' => [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@email.com',
            'phone_code' => '+1',
            'phone' => '123456789',
        ],
        'note' => $note,
    ];
}