<?php

namespace App\Application\Unit\DTO;

/**
 * Data transfer object used to create a unit.
 *
 * Carries validated input data from the request layer
 * into the application action.
 */
final class StoreUnitData
{
    public function __construct(
        public readonly int $branchId,
        public readonly string $name,
        public readonly ?string $description,
        public readonly bool $isActive,
    ) {
    }

    /**
     * Create a DTO instance from validated request data.
     */
    public static function from(
        int $branchId,
        string $name,
        ?string $description,
        bool $isActive,
    ): self {
        return new self(
            branchId: $branchId,
            name: $name,
            description: $description,
            isActive: $isActive,
        );
    }
}