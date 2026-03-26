<?php

namespace App\Domain\Booking\Exceptions;

use DomainException;

final class InvalidTimeRangeException extends DomainException
{
    public static function invalidRange(): self
    {
        return new self(__('booking.errors.invalid_time_range'));
    }
}