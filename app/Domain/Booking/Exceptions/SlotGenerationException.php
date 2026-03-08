<?php

namespace App\Domain\Booking\Exceptions;

use DomainException;

final class SlotGenerationException extends DomainException
{
//     public static function invalidActivityMinutes(): self
//     {
//         return new self(__('booking/errors.invalid_activity_minutes'));
//     }

//     public static function negativeBufferMinutes(): self
//     {
//         return new self(__('booking/errors.negative_buffer_minutes'));
//     }

//     public static function invalidBlockMinutes(): self
//     {
//         return new self(__('booking/errors.invalid_slot_block'));
//     }

    public static function invalidActivityMinutes(): self
    {
        return new self('Activity minutes must be greater than zero.');
    }

    public static function negativeBufferMinutes(): self
    {
        return new self('Buffer minutes cannot be negative.');
    }

    public static function invalidBlockMinutes(): self
    {
        return new self('Total slot block must be greater than zero.');
    }
}