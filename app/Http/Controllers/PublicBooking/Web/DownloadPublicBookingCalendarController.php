<?php

namespace App\Http\Controllers\PublicBooking\Web;

use App\Application\PublicBooking\Queries\PublicBookingDetailQuery;
use App\Application\PublicBooking\Queries\PublicBookingPageQuery;
use App\Http\Controllers\Controller;
use App\Models\Booking\Booking;
use Illuminate\Http\Response;

final class DownloadPublicBookingCalendarController extends Controller
{
    /**
     * Download the public booking calendar file.
     */
    public function __invoke(
        string $slug,
        string $token,
        PublicBookingPageQuery $publicBookingPageQuery,
        PublicBookingDetailQuery $publicBookingDetailQuery,
    ): Response {
        // Ensure the public booking page is available.
        $publicBookingPageQuery->get($slug);

        // Resolve booking for the given workspace and token.
        $booking = $publicBookingDetailQuery->get($slug, $token, [
            'branch',
            'activity',
        ]);

        $content = $this->buildCalendarContent($booking);
        $filename = 'booking-' . $booking->public_token . '.ics';

        return response($content, 200, [
            'Content-Type' => 'text/calendar; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    }

    /**
     * Build ICS content for the booking.
     */
    private function buildCalendarContent(Booking $booking): string
    {
        $startsAt = $booking->starts_at->utc()->format('Ymd\THis\Z');
        $endsAt = $booking->ends_at->utc()->format('Ymd\THis\Z');
        $stamp = ($booking->created_at ?? now())->utc()->format('Ymd\THis\Z');

        $summary = $this->escapeText($booking->activity?->name ?? 'Booking');
        $description = $this->escapeText(
            'Booking at ' . ($booking->branch?->name ?? 'BookingCore')
        );
        $location = $this->escapeText($booking->branch?->name ?? '');
        $uid = $booking->public_token . '@bookingcore';

        return implode("\r\n", [
            'BEGIN:VCALENDAR',
            'VERSION:2.0',
            'PRODID:-//BookingCore//Public Booking//EN',
            'CALSCALE:GREGORIAN',
            'BEGIN:VEVENT',
            'UID:' . $uid,
            'DTSTAMP:' . $stamp,
            'DTSTART:' . $startsAt,
            'DTEND:' . $endsAt,
            'SUMMARY:' . $summary,
            'DESCRIPTION:' . $description,
            'LOCATION:' . $location,
            'END:VEVENT',
            'END:VCALENDAR',
            '',
        ]);
    }

    /**
     * Escape text for ICS format.
     */
    private function escapeText(string $value): string
    {
        return str_replace(
            ['\\', ';', ',', "\r", "\n"],
            ['\\\\', '\;', '\,', '', '\n'],
            $value,
        );
    }
}