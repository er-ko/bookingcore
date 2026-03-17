<?php

namespace App\Domain\Integration\DTO;

final class CalendarData
{
    /**
     * @param array<string, mixed>|null $meta
     */
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly ?string $description = null,
        public readonly ?string $timezone = null,
        public readonly bool $isPrimary = false,
        public readonly bool $isReadOnly = false,
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
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'timezone' => $this->timezone,
            'is_primary' => $this->isPrimary,
            'is_read_only' => $this->isReadOnly,
            'meta' => $this->meta,
        ];
    }
}