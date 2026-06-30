<?php

namespace App\Application\Property\Actions;

use App\Application\Property\DTO\UpdatePropertyData;
use App\Models\Property\Property;
use App\Models\User;
use RuntimeException;

final class UpdateProperty
{
    /**
     * Update an existing property for the given user.
     */
    public function __invoke(User $user, string $propertyPublicId, UpdatePropertyData $data): Property
    {
        $property = Property::query()
            ->where('public_id', $propertyPublicId)
            ->where('user_id', $user->id)
            ->first();

        if (! $property) {
            throw new RuntimeException(__('property.messages.not_found'));
        }

        $property->fill([
            'name'               => $data->name,
            'description'        => $data->description,
            'rental_type'        => $data->rentalType,
            'property_type'      => $data->propertyType,
            'address_line_1'     => $data->addressLine1,
            'address_line_2'     => $data->addressLine2,
            'city'               => $data->city,
            'postcode'           => $data->postcode,
            'country_code'       => $data->countryCode,
            'timezone'           => $data->timezone,
            'max_guests'         => $data->maxGuests,
            'size_sqm'           => $data->sizeSqm,
            'price_per_night'    => $data->pricePerNight,
            'min_nights'         => $data->minNights,
            'check_in_time'      => $data->checkInTime,
            'check_out_time'     => $data->checkOutTime,
            'cleaning_fee'       => $data->cleaningFee,
            'price_per_month'    => $data->pricePerMonth,
            'min_months'         => $data->minMonths,
            'deposit_amount'     => $data->depositAmount,
            'available_from'     => $data->availableFrom,
            'utilities_included' => $data->utilitiesIncluded,
            'is_active'          => $data->isActive,
        ]);

        $property->save();

        return $property;
    }
}
