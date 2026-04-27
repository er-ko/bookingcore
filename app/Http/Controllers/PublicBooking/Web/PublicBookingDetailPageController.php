<?php

namespace App\Http\Controllers\PublicBooking\Web;

use App\Application\PublicBooking\Queries\PublicBookingDetailQuery;
use App\Application\PublicBooking\Queries\PublicBookingPageQuery;
use App\Http\Controllers\Controller;
use App\Support\Translations\PublicBookingTranslations;
use Inertia\Inertia;
use Inertia\Response;

final class PublicBookingDetailPageController extends Controller
{
    /**
     * Show the public booking detail page.
     */
    public function __invoke(
        string $slug,
        string $token,
        PublicBookingPageQuery $publicBookingPageQuery,
        PublicBookingDetailQuery $publicBookingDetailQuery,
    ): Response {
        // Ensure the public booking page is available.
        $page = $publicBookingPageQuery->get($slug);

        // Resolve booking for the given workspace and token.
        $booking = $publicBookingDetailQuery->get($slug, $token, [
            'branch',
            'unit',
            'activity',
            'customer',
        ]);

        return Inertia::render('PublicBooking/Detail', [
			'translations' => PublicBookingTranslations::detail(),
            'page' => $page,
            'booking' => [
                'public_token' => $booking->public_token,
                'status' => $booking->status?->value ?? $booking->status,
                'note' => $booking->note,
                'starts_at' => $booking->starts_at?->toIso8601String(),
                'ends_at' => $booking->ends_at?->toIso8601String(),
                'confirmed_at' => $booking->confirmed_at?->toIso8601String(),
                'branch' => $booking->branch ? [
					'public_id' => $booking->branch->public_id,
					'name' => $booking->branch->name,
					'address_line_1' => $booking->branch->address_line_1,
					'address_line_2' => $booking->branch->address_line_2,
					'city' => $booking->branch->city,
					'postcode' => $booking->branch->postcode,
					'country_code' => $booking->branch->country_code,
				] : null,
                'unit' => $booking->unit ? [
                    'public_id' => $booking->unit->public_id,
                    'name' => $booking->unit->name,
                ] : null,
                'activity' => $booking->activity ? [
                    'public_id' => $booking->activity->public_id,
                    'name' => $booking->activity->name,
                ] : null,
                'customer' => $booking->customer ? [
                    'first_name' => $booking->customer->first_name,
                    'last_name' => $booking->customer->last_name,
                    'email' => $booking->customer->email,
					'phone_code' => $booking->customer->phone_code,
                    'phone' => $booking->customer->phone,
                ] : null,
            ],
        ]);
    }
}