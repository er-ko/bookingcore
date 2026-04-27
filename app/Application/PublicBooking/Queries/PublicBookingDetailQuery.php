<?php

namespace App\Application\PublicBooking\Queries;

use App\Models\Booking\Booking;
use App\Models\Identity\UserIdentitySettings;

final class PublicBookingDetailQuery
{
    /**
     * Resolve a public booking by workspace slug and booking token.
     */
    public function get(string $slug, string $token, array $with = []): Booking
    {
        $identity = UserIdentitySettings::query()
            ->with('user')
            ->where('slug', $slug)
            ->firstOrFail();

        $user = $identity->user;

        if (! $user) {
            abort(404);
        }

        return Booking::query()
            ->with($with)
            ->where('public_token', $token)
            ->whereHas('branch', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->firstOrFail();
    }
}