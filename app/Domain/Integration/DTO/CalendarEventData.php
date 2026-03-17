<?php

namespace App\Domain\Integration\DTO;

use Carbon\CarbonInterface;

final class CalendarEventData
{
    /**
     * @param array<int, string> $attendees
     * @param array<string, mixed>|null $meta
     */
    public function __construct(
        public readonly string $title,
        public readonly ?string $description,
        public readonly CarbonInterface $startsAt,
        public readonly CarbonInterface $endsAt,
        public readonly ?string $timezone = null,
        public readonly ?string $location = null,
        public readonly array $attendees = [],
        public readonly ?array $meta = null,
    ) {
    }

    /**
     * Convert DTO to a plain array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'starts_at' => $this->startsAt->toDateTimeString(),
            'ends_at' => $this->endsAt->toDateTimeString(),
            'timezone' => $this->timezone,
            'location' => $this->location,
            'attendees' => $this->attendees,
            'meta' => $this->meta,
        ];
    }
}