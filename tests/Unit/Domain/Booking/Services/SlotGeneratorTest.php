<?php

use App\Domain\Booking\Exceptions\SlotGenerationException;
use App\Domain\Booking\Services\SlotGenerator;
use App\Domain\Booking\Support\TimeRange;

it('generates slots in fixed booking blocks', function () {
    // Arrange
    $generator = createSlotGenerator();
    $segment = createTimeRange('2026-03-08 09:00:00', '2026-03-08 12:00:00');

    // Act
    $slots = $generator->generate(
        segment: $segment,
        activityMinutes: 60,
        beforeBufferMinutes: 10,
        afterBufferMinutes: 5,
    );

    // Assert
    expect($slots)->toHaveCount(2);

    expect($slots[0]->start()->format('H:i'))->toBe('09:00');
    expect($slots[0]->end()->format('H:i'))->toBe('10:00');

    expect($slots[1]->start()->format('H:i'))->toBe('10:15');
    expect($slots[1]->end()->format('H:i'))->toBe('11:15');
});

it('allows the final slot when before buffer and activity fit inside the segment', function () {
    // Arrange
    $generator = createSlotGenerator();
    $segment = createTimeRange('2026-03-08 09:00:00', '2026-03-08 12:45:00');

    // Act
    $slots = $generator->generate(
        segment: $segment,
        activityMinutes: 60,
        beforeBufferMinutes: 10,
        afterBufferMinutes: 5,
    );

    // Assert
    expect($slots)->toHaveCount(3);

    expect($slots[2]->start()->format('H:i'))->toBe('11:30');
    expect($slots[2]->end()->format('H:i'))->toBe('12:30');
});

it('does not generate the final slot when before buffer and activity exceed the segment end', function () {
    // Arrange
    $generator = createSlotGenerator();
    $segment = createTimeRange('2026-03-08 09:00:00', '2026-03-08 12:39:00');

    // Act
    $slots = $generator->generate(
        segment: $segment,
        activityMinutes: 60,
        beforeBufferMinutes: 10,
        afterBufferMinutes: 5,
    );

    // Assert
    expect($slots)->toHaveCount(3);
});

it('throws an exception when activity minutes are invalid', function () {
    // Arrange
    $generator = createSlotGenerator();
    $segment = createTimeRange('2026-03-08 09:00:00', '2026-03-08 12:00:00');

    // Act
    $generator->generate(
        segment: $segment,
        activityMinutes: 0,
        beforeBufferMinutes: 10,
        afterBufferMinutes: 5,
    );
})->throws(SlotGenerationException::class, 'Activity minutes must be greater than zero.');

it('throws an exception when buffer minutes are negative', function () {
    // Arrange
    $generator = createSlotGenerator();
    $segment = createTimeRange('2026-03-08 09:00:00', '2026-03-08 12:00:00');

    // Act
    $generator->generate(
        segment: $segment,
        activityMinutes: 60,
        beforeBufferMinutes: -1,
        afterBufferMinutes: 5,
    );
})->throws(SlotGenerationException::class, 'Buffer minutes cannot be negative.');

/**
 * Create a slot generator instance for testing.
 */
function createSlotGenerator(): SlotGenerator
{
    return new SlotGenerator();
}

/**
 * Create a time range for test scenarios.
 */
function createTimeRange(string $start, string $end): TimeRange
{
    return TimeRange::from($start, $end);
}