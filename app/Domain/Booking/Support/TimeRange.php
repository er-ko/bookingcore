<?php

namespace App\Domain\Booking\Support;

use App\Domain\Booking\Exceptions\InvalidTimeRangeException;
use Carbon\CarbonImmutable;
use Carbon\CarbonInterface;

/**
 * Immutable value object representing a time interval.
 *
 * TimeRange is widely used in the booking domain to represent:
 * - working hours segments
 * - blocked time ranges
 * - generated booking slots
 *
 * The start of the range is inclusive and the end is exclusive.
 */
final class TimeRange
{
    /**
     * Create a new time range.
     *
     * The start must always be strictly earlier than the end.
     *
     * @throws InvalidTimeRangeException
     */
    public function __construct(
        private readonly CarbonImmutable $start,
        private readonly CarbonImmutable $end,
    ) {
        if ($this->start->greaterThanOrEqualTo($this->end)) {
            throw InvalidTimeRangeException::invalidRange();
        }
    }

    /**
     * Create a TimeRange from two date-time values.
     *
     * Both Carbon instances and string representations are supported.
     */
    public static function from(CarbonInterface|string $start, CarbonInterface|string $end): self
    {
        return new self(
            CarbonImmutable::parse($start),
            CarbonImmutable::parse($end),
        );
    }

    /**
     * Get the start of the range.
     */
    public function start(): CarbonImmutable
    {
        return $this->start;
    }

    /**
     * Get the end of the range.
     */
    public function end(): CarbonImmutable
    {
        return $this->end;
    }

    /**
     * Determine whether this range overlaps with another range.
     */
    public function overlaps(self $other): bool
    {
        return $this->start->lt($other->end())
            && $this->end->gt($other->start());
    }

    /**
     * Determine whether this range fully contains another range.
     */
    public function contains(self $other): bool
    {
        return $this->start->lessThanOrEqualTo($other->start())
            && $this->end->greaterThanOrEqualTo($other->end());
    }

    /**
     * Determine whether a specific moment falls inside the range.
     *
     * The start is inclusive and the end is exclusive.
     */
    public function containsPoint(CarbonInterface|string $point): bool
    {
        $point = $point instanceof CarbonInterface
            ? CarbonImmutable::instance($point)
            : CarbonImmutable::parse($point);

        return $point->greaterThanOrEqualTo($this->start)
            && $point->lessThan($this->end);
    }

    /**
     * Get the duration of the range in minutes.
     */
    public function durationInMinutes(): int
    {
        return $this->start->diffInMinutes($this->end);
    }

    /**
     * Determine whether two time ranges represent the same interval.
     */
    public function equals(self $other): bool
    {
        return $this->start->equalTo($other->start())
            && $this->end->equalTo($other->end());
    }

    /**
     * Convert the range into a simple array representation.
     *
     * @return array{start: string, end: string}
     */
    public function toArray(): array
    {
        return [
            'start' => $this->start->toDateTimeString(),
            'end' => $this->end->toDateTimeString(),
        ];
    }
}