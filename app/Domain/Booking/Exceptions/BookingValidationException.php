<?php

namespace App\Domain\Booking\Exceptions;

final class BookingValidationException extends BookingException
{
    public static function activityInactive(): self
    {
        return new self(__('booking.errors.activity_inactive'));
    }

    public static function unitInvalid(): self
    {
        return new self(__('booking.errors.unit_invalid'));
    }
}