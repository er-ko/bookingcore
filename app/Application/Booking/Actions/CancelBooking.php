<?php

namespace App\Application\Booking\Actions;

use App\Domain\Booking\Services\BookingService;
use App\Models\Booking\Booking;

final class CancelBooking
{
    public function __construct(
        private readonly BookingService $bookingService,
    ) {
    }

    public function __invoke(Booking $booking): Booking
    {
        return $this->bookingService->cancel($booking);
    }
}