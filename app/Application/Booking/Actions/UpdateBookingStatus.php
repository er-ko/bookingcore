<?php

namespace App\Application\Booking\Actions;

use App\Domain\Booking\Services\BookingService;
use App\Enums\BookingStatus;
use App\Models\Booking\Booking;

final class UpdateBookingStatus
{
    public function __construct(
        private readonly BookingService $bookingService,
    ) {
    }

    public function __invoke(Booking $booking, BookingStatus $status): Booking
    {
        return $this->bookingService->updateStatus($booking, $status);
    }
}