<?php

namespace App\Application\Activity\DTO;

/**
 * Data transfer object used to update a activity.
 *
 * Carries validated input data from the request layer
 * into the application action.
 */
final class UpdateActivityData
{
    public function __construct(
        public readonly string $name,
        public readonly int $durationMinutes,
        public readonly int $bufferBeforeMinutes,
        public readonly int $bufferAfterMinutes,
        public readonly bool $isActive,
    ) {
    }

    /**
     * Create a DTO instance from validated request data.
     */
    public static function from(
        string $name,
        int $durationMinutes,
        int $bufferBeforeMinutes,
        int $bufferAfterMinutes,
        bool $isActive,
    ): self {
        return new self(
            name: $name,
            durationMinutes: $durationMinutes,
            bufferBeforeMinutes: $bufferBeforeMinutes,
            bufferAfterMinutes: $bufferAfterMinutes,
            isActive: $isActive,
        );
    }
}