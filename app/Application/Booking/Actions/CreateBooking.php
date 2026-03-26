<?php

namespace App\Application\Booking\Actions;

use App\Application\Booking\DTO\CreateBookingData;
use App\Domain\Booking\Services\BookingService;
use App\Models\Booking\Booking;

final class CreateBooking
{
    public function __construct(
        private readonly BookingService $bookingService,
    ) {
    }

    public function __invoke(CreateBookingData $data): Booking
    {
        return $this->bookingService->create($data);
    }
}