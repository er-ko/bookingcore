<?php

namespace App\Domain\Booking\Exceptions;

final class BookingValidationException extends BookingException
{
    public static function activityInactive(): self
    {
        return new self(__('booking/errors.activity_inactive'));
    }

    public static function resourceInvalid(): self
    {
        return new self(__('booking/errors.resource_invalid'));
    }
}