<?php

namespace App\Application\Branch\DTO;

/**
 * Data transfer object used to create a branch.
 *
 * Carries validated input data from the request layer
 * into the application action.
 */
final class StoreBranchData
{
    public function __construct(
        public readonly string $name,
        public readonly ?string $addressLine1,
        public readonly ?string $addressLine2,
        public readonly ?string $city,
        public readonly ?string $postcode,
        public readonly ?string $countryCode,
        public readonly string $timezone,
        public readonly bool $isActive,
    ) {
    }

    /**
     * Create a DTO instance from validated request data.
     */
    public static function from(
        string $name,
        ?string $addressLine1,
        ?string $addressLine2,
        ?string $city,
        ?string $postcode,
        ?string $countryCode,
        string $timezone,
        bool $isActive,
    ): self {
        return new self(
            name: $name,
            addressLine1: $addressLine1,
            addressLine2: $addressLine2,
            city: $city,
            postcode: $postcode,
            countryCode: $countryCode,
            timezone: $timezone,
            isActive: $isActive,
        );
    }
}