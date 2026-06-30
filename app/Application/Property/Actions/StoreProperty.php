<?php

namespace App\Application\Property\Actions;

use App\Application\Property\DTO\StorePropertyData;
use App\Models\Property\Property;
use App\Models\User;
use RuntimeException;

final class StoreProperty
{
    private const MAX_PROPERTIES_PER_USER = 10;

    /**
     * Create a new property for the given user.
     */
    public function __invoke(User $user, StorePropertyData $data): Property
    {
        $count = Property::query()
            ->where('user_id', $user->id)
            ->count();

        if ($count >= self::MAX_PROPERTIES_PER_USER) {
            throw new RuntimeException(__('property.messages.limit_reached'));
        }

        $property = new Property();

        $property->fill([
            'user_id'            => $user->id,
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
