<?php

namespace App\Domain\Booking\DTO;

/**
 * Data transfer object representing customer information
 * used when creating a booking.
 */
final class CustomerData
{
    public function __construct(
        public readonly string $firstName,
        public readonly ?string $lastName,
        public readonly string $email,
        public readonly ?string $phoneCode,
        public readonly ?string $phone,
    ) {
    }

    /**
     * Create a customer DTO from raw input values.
     */
    public static function from(
        string $firstName,
        ?string $lastName,
        string $email,
        ?string $phoneCode,
        ?string $phone,
    ): self {
        return new self(
            firstName: $firstName,
            lastName: $lastName,
            email: $email,
            phoneCode: $phoneCode,
            phone: $phone,
        );
    }
}