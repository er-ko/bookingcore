<?php

namespace App\Domain\Booking\Exceptions;

final class BookingConflictException extends BookingException
{
    public static function overlappingBooking(): self
    {
        return new self(__('booking.errors.booking_conflict'));
    }

    public static function unitAlreadyBooked(): self
    {
        return new self(__('booking.errors.unit_already_booked'));
    }
}