<?php

namespace App\Application\PublicBooking\Actions;

use App\Application\Booking\DTO\CreateBookingData;
use App\Domain\Booking\Services\BookingService;
use App\Models\Booking\Booking;

final class CreatePublicBooking
{
    public function __construct(
        private readonly BookingService $bookingService,
    ) {
    }

    /**
     * Create a public booking and return the created model.
     */
    public function __invoke(CreateBookingData $data): Booking
    {
        return $this->bookingService->createPublic($data);
    }
}