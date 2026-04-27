<?php

use App\Application\Integration\Actions\CancelBookingCalendarEvent;
use App\Application\Integration\Actions\CreateBookingCalendarEvent;
use App\Application\Integration\Actions\UpdateBookingCalendarEvent;
use App\Application\Booking\DTO\CreateBookingData;
use App\Application\Booking\DTO\CustomerData;
use App\Domain\Booking\Exceptions\BookingConflictException;
use App\Domain\Booking\Exceptions\BookingValidationException;
use App\Domain\Booking\Exceptions\SlotUnavailableException;
use App\Domain\Booking\Services\BookingService;
use App\Infrastructure\Booking\Repositories\BookingRepository;
use App\Enums\BookingStatus;
use App\Models\Activity;
use App\Models\Booking\Booking;
use App\Models\Branch;
use App\Models\Customer;
use App\Models\Price;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

uses(RefreshDatabase::class);

it('creates a booking successfully', function () {
    // Arrange
    $user = User::factory()->create();

    [$branch, $unit, $activity] = createBookingScenario($user->id);

    $data = createBookingData(
        branchId: $branch->id,
        unitId: $unit->id,
        activityId: $activity->id,
        startsAt: '2026-03-09 10:00:00',
        note: 'Please call before arrival.',
    );

    $service = createBookingService();

    // Act
    $booking = $service->create($data);

    // Assert
    expect($booking)->toBeInstanceOf(Booking::class);
    expect($booking->branch_id)->toBe($branch->id);
    expect($booking->unit_id)->toBe($unit->id);
    expect($booking->activity_id)->toBe($activity->id);
    expect($booking->status)->toBe(BookingStatus::Pending);
    expect($booking->starts_at->format('Y-m-d H:i:s'))->toBe('2026-03-09 10:00:00');
    expect($booking->ends_at->format('Y-m-d H:i:s'))->toBe('2026-03-09 11:00:00');
    expect($booking->note)->toBe('Please call before arrival.');

    expect(Customer::count())->toBe(1);
    expect(Booking::count())->toBe(1);
});

it('throws a conflict exception when the unit is already booked', function () {
    // Arrange
    $user = User::factory()->create();

    [$branch, $unit, $activity] = createBookingScenario($user->id);

    $existingCustomer = createCustomer(
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

    $data = createBookingData(
        branchId: $branch->id,
        unitId: $unit->id,
        activityId: $activity->id,
        startsAt: '2026-03-09 10:00:00',
    );

    $service = createBookingService();

    // Act
    $service->create($data);
})->throws(BookingConflictException::class);

it('throws a slot unavailable exception when the activity is not assigned to the unit', function () {
    // Arrange
    $user = User::factory()->create();

    $branch = createBranch($user->id);

    $unit = createUnit($user->id, $branch->id);

    $activity = createActivity(
        userId: $user->id,
        durationMinutes: 60,
        bufferBeforeMinutes: 10,
        bufferAfterMinutes: 5,
        isActive: true,
    );

    $data = createBookingData(
        branchId: $branch->id,
        unitId: $unit->id,
        activityId: $activity->id,
        startsAt: '2026-03-09 10:00:00',
    );

    $service = createBookingService();

    // Act
    $service->create($data);
})->throws(SlotUnavailableException::class);

it('reuses an existing customer by email', function () {
    // Arrange
    $user = User::factory()->create();

    [$branch, $unit, $activity] = createBookingScenario($user->id);

    $existingCustomer = createCustomer(
        firstName: 'John',
        lastName: 'Doe',
        email: 'johndoe@email.com',
        phoneCode: '+1',
        phone: '123456789',
    );

    $data = createBookingData(
        branchId: $branch->id,
        unitId: $unit->id,
        activityId: $activity->id,
        startsAt: '2026-03-09 10:00:00',
    );

    $service = createBookingService();

    // Act
    $booking = $service->create($data);

    // Assert
    expect(Customer::count())->toBe(1);
    expect($booking->customer_id)->toBe($existingCustomer->id);
});

it('throws an exception when the activity is inactive', function () {
    // Arrange
    $user = User::factory()->create();

    $branch = createBranch($user->id);

    $unit = createUnit($user->id, $branch->id);

    $activity = createActivity(
        userId: $user->id,
        durationMinutes: 60,
        bufferBeforeMinutes: 10,
        bufferAfterMinutes: 5,
        isActive: false,
    );

    assignActivityToUnit($activity->id, $unit->id);

    $data = createBookingData(
        branchId: $branch->id,
        unitId: $unit->id,
        activityId: $activity->id,
        startsAt: '2026-03-09 10:00:00',
    );

    $service = createBookingService();

    // Act
    $service->create($data);
})->throws(BookingValidationException::class, 'The selected activity does not exist or is inactive.');

it('throws an exception when the unit does not belong to the given branch', function () {
    // Arrange
    $user = User::factory()->create();

    $branch = createBranch($user->id, 'Brno');
    $otherBranch = createBranch($user->id, 'Prague');

    $unit = createUnit($user->id, $otherBranch->id);

    $activity = createActivity(
        userId: $user->id,
        durationMinutes: 60,
        bufferBeforeMinutes: 10,
        bufferAfterMinutes: 5,
        isActive: true,
    );

    assignActivityToUnit($activity->id, $unit->id);

    $data = createBookingData(
        branchId: $branch->id,
        unitId: $unit->id,
        activityId: $activity->id,
        startsAt: '2026-03-09 10:00:00',
    );

    $service = createBookingService();

    // Act
    $service->create($data);
})->throws(
    BookingValidationException::class,
    'The selected unit does not exist, is inactive, or does not belong to the given branch.'
);

/**
 * Create a complete booking scenario with branch, unit, activity,
 * and activity assignment.
 *
 * @return array{0: Branch, 1: Unit, 2: Activity}
 */
function createBookingScenario(int $userId): array
{
    $branch = createBranch($userId);

    $unit = createUnit($userId, $branch->id);

    $activity = createActivity(
        userId: $userId,
        durationMinutes: 60,
        bufferBeforeMinutes: 10,
        bufferAfterMinutes: 5,
        isActive: true,
    );

    assignActivityToUnit($activity->id, $unit->id);

    return [$branch, $unit, $activity];
}

/**
 * Create a branch for booking tests.
 */
function createBranch(int $userId, string $name = 'Brno'): Branch
{
    return Branch::create([
        'user_id' => $userId,
        'public_id' => 'br_' . Str::random(10),
        'name' => $name,
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
 * Create a unit for a branch.
 */
function createUnit(int $userId, int $branchId): Unit
{
    return Unit::create([
        'user_id' => $userId,
        'public_id' => 'un_' . Str::random(10),
        'branch_id' => $branchId,
        'name' => 'Chair A',
        'description' => null,
        'is_active' => true,
    ]);
}

/**
 * Create an activity for booking tests.
 */
function createActivity(
    int $userId,
    int $durationMinutes,
    int $bufferBeforeMinutes,
    int $bufferAfterMinutes,
    bool $isActive,
): Activity {
    return Activity::create([
        'user_id' => $userId,
        'public_id' => 'ac_' . Str::random(10),
        'name' => 'Consultation',
        'duration_minutes' => $durationMinutes,
        'buffer_before_minutes' => $bufferBeforeMinutes,
        'buffer_after_minutes' => $bufferAfterMinutes,
        'is_active' => $isActive,
    ]);
}

/**
 * Assign an activity to a unit.
 */
function assignActivityToUnit(int $activityId, int $unitId): Price
{
    return Price::create([
        'activity_id' => $activityId,
        'unit_id' => $unitId,
        'price' => '100.00',
    ]);
}

/**
 * Create a customer for booking tests.
 */
function createCustomer(
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
 * Create booking DTO data for tests.
 */
function createBookingData(
    int $branchId,
    int $unitId,
    int $activityId,
    string $startsAt,
    ?string $note = null,
): CreateBookingData {
    return CreateBookingData::from(
        branchId: $branchId,
        unitId: $unitId,
        activityId: $activityId,
        startsAt: $startsAt,
        customer: CustomerData::from(
            firstName: 'John',
            lastName: 'Doe',
            email: 'johndoe@email.com',
            phoneCode: '+1',
            phone: '123456789',
        ),
        note: $note,
    );
}

/**
 * Create a booking service instance for testing.
 */
function createBookingService(): BookingService
{
    return new BookingService(
        new BookingRepository(),
        app(\App\Infrastructure\Integration\Repositories\IntegrationRepository::class),
        app(\App\Domain\Integration\Policies\BookingCalendarSyncPolicy::class),
        app(CreateBookingCalendarEvent::class),
        app(UpdateBookingCalendarEvent::class),
    );
}
