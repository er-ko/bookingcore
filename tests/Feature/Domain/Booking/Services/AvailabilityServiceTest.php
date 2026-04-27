<?php

use App\Application\Booking\DTO\AvailabilityQuery;
use App\Domain\Booking\Services\AvailabilityService;
use App\Domain\Booking\Services\SlotGenerator;
use App\Infrastructure\Booking\Repositories\AvailabilityRepository;
use App\Enums\BookingStatus;
use App\Enums\DayOfWeek;
use App\Models\Activity;
use App\Models\Booking\Booking;
use App\Models\Booking\TimeOff;
use App\Models\Booking\WorkingHour;
use App\Models\Branch;
use App\Models\Customer;
use App\Models\Price;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('returns available slots for a unit on a given day', function () {
    // Arrange
    $user = User::factory()->create();

    [$branch, $unit, $activity] = createAvailabilityScenario($user->id);

    createWorkingHour(
        unitId: $unit->id,
        dayOfWeek: DayOfWeek::Monday,
        startTime: '09:00:00',
        endTime: '12:00:00',
    );

    $query = createAvailabilityQuery(
        branchId: $branch->id,
        unitId: $unit->id,
        activityId: $activity->id,
        date: '2026-03-09',
    );

    $service = createAvailabilityService();

    // Act
    $slots = $service->getAvailableSlots($query);

    // Assert
    expect($slots)->toHaveCount(2);

    expect($slots[0]->start()->format('H:i'))->toBe('09:00');
    expect($slots[0]->end()->format('H:i'))->toBe('10:00');

    expect($slots[1]->start()->format('H:i'))->toBe('10:15');
    expect($slots[1]->end()->format('H:i'))->toBe('11:15');
});

it('splits availability by time off periods', function () {
    // Arrange
    $user = User::factory()->create();

    [$branch, $unit, $activity] = createAvailabilityScenario($user->id);

    createWorkingHour(
        unitId: $unit->id,
        dayOfWeek: DayOfWeek::Monday,
        startTime: '09:00:00',
        endTime: '17:00:00',
    );

    TimeOff::create([
        'unit_id' => $unit->id,
        'starts_at' => '2026-03-09 12:00:00',
        'ends_at' => '2026-03-09 13:00:00',
        'reason' => 'Lunch break',
    ]);

    $query = createAvailabilityQuery(
        branchId: $branch->id,
        unitId: $unit->id,
        activityId: $activity->id,
        date: '2026-03-09',
    );

    $service = createAvailabilityService();

    // Act
    $slots = $service->getAvailableSlots($query);

    // Assert
    expect($slots)->toHaveCount(5);

    expect($slots[0]->start()->format('H:i'))->toBe('09:00');
    expect($slots[0]->end()->format('H:i'))->toBe('10:00');

    expect($slots[1]->start()->format('H:i'))->toBe('10:15');
    expect($slots[1]->end()->format('H:i'))->toBe('11:15');

    expect($slots[2]->start()->format('H:i'))->toBe('13:00');
    expect($slots[2]->end()->format('H:i'))->toBe('14:00');

    expect($slots[3]->start()->format('H:i'))->toBe('14:15');
    expect($slots[3]->end()->format('H:i'))->toBe('15:15');

    expect($slots[4]->start()->format('H:i'))->toBe('15:30');
    expect($slots[4]->end()->format('H:i'))->toBe('16:30');
});

it('excludes slots that conflict with existing bookings', function () {
    // Arrange
    $user = User::factory()->create();

    [$branch, $unit, $activity] = createAvailabilityScenario($user->id);

    createWorkingHour(
        unitId: $unit->id,
        dayOfWeek: DayOfWeek::Monday,
        startTime: '09:00:00',
        endTime: '12:00:00',
    );

    $customer = Customer::create([
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'johndoe@email.com',
        'phone_code' => '+1',
        'phone' => '123456789',
    ]);

    Booking::create([
        'branch_id' => $branch->id,
        'unit_id' => $unit->id,
        'activity_id' => $activity->id,
        'customer_id' => $customer->id,
        'starts_at' => '2026-03-09 10:25:00',
        'ends_at' => '2026-03-09 11:25:00',
        'status' => BookingStatus::Confirmed,
        'note' => null,
        'confirmed_at' => '2026-03-08 12:00:00',
        'cancelled_at' => null,
    ]);

    $query = createAvailabilityQuery(
        branchId: $branch->id,
        unitId: $unit->id,
        activityId: $activity->id,
        date: '2026-03-09',
    );

    $service = createAvailabilityService();

    // Act
    $slots = $service->getAvailableSlots($query);

    // Assert
    expect($slots)->toHaveCount(1);

    expect($slots[0]->start()->format('H:i'))->toBe('09:00');
    expect($slots[0]->end()->format('H:i'))->toBe('10:00');
});

/**
 * Create a complete availability test scenario with branch, unit, activity,
 * and activity assignment.
 *
 * @return array{0: Branch, 1: Unit, 2: Activity}
 */
function createAvailabilityScenario(int $userId): array
{
    $branch = Branch::create([
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

    $unit = Unit::create([
        'user_id' => $userId,
        'public_id' => 'un_1234567890',
        'branch_id' => $branch->id,
        'name' => 'Chair A',
        'description' => null,
        'is_active' => true,
    ]);

    $activity = Activity::create([
        'user_id' => $userId,
        'public_id' => 'ac_1234567890',
        'name' => 'Consultation',
        'duration_minutes' => 60,
        'buffer_before_minutes' => 10,
        'buffer_after_minutes' => 5,
        'is_active' => true,
    ]);

    Price::create([
        'activity_id' => $activity->id,
        'unit_id' => $unit->id,
        'price' => '100.00',
    ]);

    return [$branch, $unit, $activity];
}

/**
 * Create a working hour record for a unit.
 */
function createWorkingHour(
    int $unitId,
    DayOfWeek $dayOfWeek,
    string $startTime,
    string $endTime,
): WorkingHour {
    return WorkingHour::create([
        'unit_id' => $unitId,
        'day_of_week' => $dayOfWeek->value,
        'start_time' => $startTime,
        'end_time' => $endTime,
        'is_active' => true,
    ]);
}

/**
 * Create an availability query DTO for testing.
 */
function createAvailabilityQuery(
    int $branchId,
    int $unitId,
    int $activityId,
    string $date,
): AvailabilityQuery {
    return AvailabilityQuery::from(
        branchId: $branchId,
        unitId: $unitId,
        activityId: $activityId,
        date: $date,
    );
}

/**
 * Create an availability service instance for testing.
 */
function createAvailabilityService(): AvailabilityService
{
    return new AvailabilityService(
        new AvailabilityRepository(),
        new SlotGenerator(),
    );
}
