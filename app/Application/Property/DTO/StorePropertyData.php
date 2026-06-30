<?php

namespace App\Application\Property\DTO;

use App\Enums\Properties\PropertyType;
use App\Enums\Properties\RentalType;

/**
 * Data transfer object used to create a property.
 *
 * Carries validated input data from the request layer
 * into the application action.
 */
final class StorePropertyData
{
    public function __construct(
        public readonly string $name,
        public readonly ?string $description,
        public readonly RentalType $rentalType,
        public readonly PropertyType $propertyType,
        public readonly ?string $addressLine1,
        public readonly ?string $addressLine2,
        public readonly ?string $city,
        public readonly ?string $postcode,
        public readonly ?string $countryCode,
        public readonly string $timezone,
        public readonly ?int $maxGuests,
        public readonly ?int $sizeSqm,
        // Short-term
        public readonly ?string $pricePerNight,
        public readonly int $minNights,
        public readonly ?string $checkInTime,
        public readonly ?string $checkOutTime,
        public readonly ?string $cleaningFee,
        // Long-term
        public readonly ?string $pricePerMonth,
        public readonly int $minMonths,
        public readonly ?string $depositAmount,
        public readonly ?string $availableFrom,
        public readonly bool $utilitiesIncluded,
        public readonly bool $isActive,
    ) {}

    public static function from(array $data): self
    {
        return new self(
            name:              $data['name'],
            description:       $data['description'] ?? null,
            rentalType:        RentalType::from($data['rental_type']),
            propertyType:      PropertyType::from($data['property_type']),
            addressLine1:      $data['address_line_1'] ?? null,
            addressLine2:      $data['address_line_2'] ?? null,
            city:              $data['city'] ?? null,
            postcode:          $data['postcode'] ?? null,
            countryCode:       $data['country_code'] ?? null,
            timezone:          $data['timezone'],
            maxGuests:         isset($data['max_guests']) ? (int) $data['max_guests'] : null,
            sizeSqm:           isset($data['size_sqm']) ? (int) $data['size_sqm'] : null,
            pricePerNight:     $data['price_per_night'] ?? null,
            minNights:         (int) ($data['min_nights'] ?? 1),
            checkInTime:       $data['check_in_time'] ?? null,
            checkOutTime:      $data['check_out_time'] ?? null,
            cleaningFee:       $data['cleaning_fee'] ?? null,
            pricePerMonth:     $data['price_per_month'] ?? null,
            minMonths:         (int) ($data['min_months'] ?? 1),
            depositAmount:     $data['deposit_amount'] ?? null,
            availableFrom:     $data['available_from'] ?? null,
            utilitiesIncluded: (bool) ($data['utilities_included'] ?? false),
            isActive:          (bool) ($data['is_active'] ?? true),
        );
    }
}
