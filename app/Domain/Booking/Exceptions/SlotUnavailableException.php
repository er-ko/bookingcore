<?php

namespace App\Domain\Booking\Exceptions;

final class SlotUnavailableException extends BookingException
{
    public static function dueToOverlap(): self
    {
        return new self(__('booking.errors.slot_overlap'));
    }

    public static function outsideWorkingHours(): self
    {
        return new self(__('booking.errors.outside_working_hours'));
    }

    public static function duringTimeOff(): self
    {
        return new self(__('booking.errors.during_time_off'));
    }

    public static function activityNotAvailableForUnit(): self
    {
        return new self(__('booking.errors.activity_not_available_for_unit'));
    }
}