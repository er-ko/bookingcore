<?php

use App\Enums\BookingStatus;
use App\Models\Activity;
use App\Models\Booking\Booking;
use App\Models\Branch;
use App\Models\Customer;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('cancels a booking through the API', function () {
    // Arrange
    $booking = createBookingForApiTest(
        status: BookingStatus::Pending,
        cancelledAt: null,
    );

    // Act
    $response = $this->postJson("/api/bookings/{$booking->id}/cancel");

    // Assert
    $response
        ->assertOk()
        ->assertJson([
            'message' => 'Booking cancelled successfully.',
        ]);

    $this->assertDatabaseHas('bookings', [
        'id' => $booking->id,
        'status' => BookingStatus::Cancelled->value,
    ]);

    expect($booking->fresh()->cancelled_at)->not->toBeNull();
});

it('returns an error when the booking is already cancelled', function () {
    // Arrange
    $booking = createBookingForApiTest(
        status: BookingStatus::Cancelled,
        cancelledAt: '2026-03-08 12:00:00',
    );

    // Act
    $response = $this->postJson("/api/bookings/{$booking->id}/cancel");

    // Assert
    $response
        ->assertUnprocessable()
        ->assertJson([
            'message' => 'The booking is already cancelled.',
        ]);
});

/**
 * Create a booking record for API cancellation tests.
 */
function createBookingForApiTest(
    BookingStatus $status,
    ?string $cancelledAt,
): Booking {
    $user = User::factory()->create();

    $branch = createApiTestBranch($user->id);
    $unit = createApiTestUnit($user->id, $branch->id);
    $activity = createApiTestActivity($user->id);
    $customer = createApiTestCustomer();

    return Booking::create([
        'branch_id' => $branch->id,
        'unit_id' => $unit->id,
        'activity_id' => $activity->id,
        'customer_id' => $customer->id,
        'starts_at' => '2026-03-09 10:00:00',
        'ends_at' => '2026-03-09 11:00:00',
        'status' => $status->value,
        'note' => null,
        'confirmed_at' => null,
        'cancelled_at' => $cancelledAt,
    ]);
}

/**
 * Create a branch for API booking tests.
 */
function createApiTestBranch(int $userId): Branch
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
 * Create a unit for API booking tests.
 */
function createApiTestUnit(int $userId, int $branchId): Unit
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
 * Create an activity for API booking tests.
 */
function createApiTestActivity(int $userId): Activity
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
 * Create a customer for API booking tests.
 */
function createApiTestCustomer(): Customer
{
    return Customer::create([
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'johndoe@email.com',
        'phone_code' => '+1',
        'phone' => '123456789',
    ]);
}