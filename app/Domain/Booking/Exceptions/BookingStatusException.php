<?php

namespace App\Domain\Booking\Exceptions;

final class BookingStatusException extends BookingException
{
    public static function alreadyCancelled(): self
    {
        return new self(__('booking/errors.already_cancelled'));
    }

    public static function cancelledCannotBeUpdated(): self
    {
        return new self(__('booking/errors.cancelled_cannot_be_updated'));
    }

    public static function useCancelAction(): self
    {
        return new self(__('booking/errors.use_cancel_action'));
    }

    public static function sameStatus(string $status): self
    {
        return new self(__('booking/errors.same_status', ['status' => $status]));
    }
}