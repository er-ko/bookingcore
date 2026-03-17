<?php

use App\Enums\BookingStatus;
use App\Models\Booking\Activity;
use App\Models\Booking\ActivityAssignment;
use App\Models\Booking\Booking;
use App\Models\Booking\Branch;
use App\Models\Booking\Resource;
use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('creates a booking through the API', function () {
    // Arrange
    [$branch, $resource, $activity] = createBookingApiScenario();

    $payload = createBookingPayload(
        branchId: $branch->id,
        resourceId: $resource->id,
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
        'resource_id' => $resource->id,
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
            'resource_id',
            'activity_id',
            'starts_at',
            'customer',
        ]);
});

it('returns a conflict error when the resource is already booked', function () {
    // Arrange
    [$branch, $resource, $activity] = createBookingApiScenario();

    $existingCustomer = createBookingApiCustomer(
        firstName: 'Existing',
        lastName: 'Customer',
        email: 'existingcustomer@email.com',
        phoneCode: '+1',
        phone: '987654321',
    );

    Booking::create([
        'branch_id' => $branch->id,
        'resource_id' => $resource->id,
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
        resourceId: $resource->id,
        activityId: $activity->id,
        startsAt: '2026-03-09 10:00:00',
    );

    // Act
    $response = $this->postJson('/api/bookings/create', $payload);

    // Assert
    $response
        ->assertUnprocessable()
        ->assertJson([
            'message' => 'The selected resource is already booked for the given time range.',
        ]);
});

it('returns a slot unavailable error when the activity is not assigned to the resource', function () {
    // Arrange
    $branch = createBookingApiBranch();
    $resource = createBookingApiResource($branch->id);
    $activity = createBookingApiActivity();

    $payload = createBookingPayload(
        branchId: $branch->id,
        resourceId: $resource->id,
        activityId: $activity->id,
        startsAt: '2026-03-09 10:00:00',
    );

    // Act
    $response = $this->postJson('/api/bookings/create', $payload);

    // Assert
    $response
        ->assertUnprocessable()
        ->assertJson([
            'message' => 'The selected activity is not assigned to the selected resource.',
        ]);
});

/**
 * Create a complete API booking scenario with branch, resource, activity,
 * and activity assignment.
 *
 * @return array{0: Branch, 1: Resource, 2: Activity}
 */
function createBookingApiScenario(): array
{
    $branch = createBookingApiBranch();
    $resource = createBookingApiResource($branch->id);
    $activity = createBookingApiActivity();

    assignBookingApiActivityToResource($activity->id, $resource->id);

    return [$branch, $resource, $activity];
}

/**
 * Create a branch for booking API tests.
 */
function createBookingApiBranch(): Branch
{
    return Branch::create([
        'name' => 'Brno',
        'timezone' => 'Europe/Prague',
        'is_active' => true,
    ]);
}

/**
 * Create a resource for booking API tests.
 */
function createBookingApiResource(int $branchId): Resource
{
    return Resource::create([
        'branch_id' => $branchId,
        'name' => 'Chair A',
        'description' => null,
        'is_active' => true,
    ]);
}

/**
 * Create an activity for booking API tests.
 */
function createBookingApiActivity(): Activity
{
    return Activity::create([
        'name' => 'Consultation',
        'duration_minutes' => 60,
        'buffer_before_minutes' => 10,
        'buffer_after_minutes' => 5,
        'is_active' => true,
    ]);
}

/**
 * Assign an activity to a resource for booking API tests.
 */
function assignBookingApiActivityToResource(int $activityId, int $resourceId): ActivityAssignment
{
    return ActivityAssignment::create([
        'activity_id' => $activityId,
        'resource_id' => $resourceId,
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
    int $resourceId,
    int $activityId,
    string $startsAt,
    ?string $note = null,
): array {
    return [
        'branch_id' => $branchId,
        'resource_id' => $resourceId,
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