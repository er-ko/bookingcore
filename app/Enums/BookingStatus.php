<?php

namespace App\Enums;

enum BookingStatus: string
{
    case Pending = 'pending';
    case Confirmed = 'confirmed';
    case Cancelled = 'cancelled';
    case Completed = 'completed';

    /**
     * Determine whether the status is terminal.
     */
    public function isTerminal(): bool
    {
        return in_array($this, [
            self::Cancelled,
            self::Completed,
        ], true);
    }

    /**
     * Determine whether the status should remain stored in BookingCore.
     */
    public function isPersistent(): bool
    {
        return in_array($this, [
            self::Pending,
            self::Confirmed,
        ], true);
    }
}