<?php

namespace App\Http\Controllers\PublicBooking\Web;

use App\Application\PublicBooking\Actions\CreatePublicBooking;
use App\Application\PublicBooking\Queries\PublicBookingPageQuery;
use App\Http\Controllers\Controller;
use App\Http\Requests\Booking\CreateBookingRequest;
use App\Models\Activity;
use App\Models\Branch;
use App\Models\Identity\UserIdentitySettings;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

final class StorePublicBookingController extends Controller
{
    /**
     * Store a new public booking for the given workspace slug.
     */
    public function __invoke(
        string $slug,
        CreateBookingRequest $request,
        CreatePublicBooking $createPublicBooking,
        PublicBookingPageQuery $publicBookingPageQuery,
    ): RedirectResponse {
        // Ensure the public booking page is available.
        $publicBookingPageQuery->get($slug);

        $user = $this->resolveUserBySlug($slug);
        $data = $request->toDTO();

        // Ensure selected branch belongs to the workspace owner.
        $branch = Branch::query()
            ->active()
            ->where('user_id', $user->id)
            ->whereKey($data->branchId)
            ->firstOrFail();

        // Ensure selected unit belongs to the branch.
        $unit = Unit::query()
            ->active()
            ->where('user_id', $user->id)
            ->where('branch_id', $branch->id)
            ->whereKey($data->unitId)
            ->firstOrFail();

        // Ensure selected activity belongs to the workspace owner.
        $activity = Activity::query()
            ->active()
            ->where('user_id', $user->id)
            ->whereKey($data->activityId)
            ->firstOrFail();

        // Ensure activity is available for the selected unit.
        $isAvailableForUnit = $unit->activities()
            ->whereKey($activity->id)
            ->exists();

        if (! $isAvailableForUnit) {
            abort(404);
        }

        // Create booking and redirect to public detail page.
        $booking = $createPublicBooking($data);

        return redirect()->route('public-booking.booking.show', [
            'slug' => $slug,
            'token' => $booking->public_token,
        ]);
    }

    /**
     * Resolve workspace owner by public slug.
     */
    private function resolveUserBySlug(string $slug): User
    {
        $identity = UserIdentitySettings::query()
            ->with('user')
            ->where('slug', $slug)
            ->firstOrFail();

        $user = $identity->user;

        if (! $user) {
            abort(404);
        }

        return $user;
    }
}