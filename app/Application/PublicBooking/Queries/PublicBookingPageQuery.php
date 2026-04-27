<?php

namespace App\Application\PublicBooking\Queries;

use App\Models\Branch;
use App\Models\Identity\UserIdentitySettings;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

final class PublicBookingPageQuery
{
    /**
     * Get all data required for the public booking page.
     *
     * @return array<string, mixed>
     */
    public function get(string $slug): array
    {
        $identity = UserIdentitySettings::query()
            ->with('user')
            ->where('slug', $slug)
            ->firstOrFail();

        $user = $identity->user;

        if (! $user) {
            abort(404);
        }

        if (! $this->isPublicBookingAvailable($identity, $user)) {
            abort(404);
        }

        return [
            'identity' => [
                'brand_name' => $identity->brand_name,
                'slug' => $identity->slug,
                'default_language_code' => $identity->default_language_code,
                'default_currency_code' => $identity->default_currency_code,
                'default_country_code' => $identity->default_country_code,
            ],
            'branches' => $this->getActiveBranches($user),
        ];
    }

    /**
     * Determine whether the public booking page is available for the user.
     */
    private function isPublicBookingAvailable(UserIdentitySettings $identity, User $user): bool
    {
        if (! $identity->is_public) {
            return false;
        }

        if (! $identity->isServicesMode()) {
            return false;
        }

        if (! $user->hasCompletedCalendarIntegration()) {
            return false;
        }

        if (! $user->branches()->active()->exists()) {
            return false;
        }

        if (! $user->units()->active()->exists()) {
            return false;
        }

        if (! $user->activities()->active()->exists()) {
            return false;
        }

        return $this->hasReservableCombination($user);
    }

    /**
     * Determine whether the user has at least one reservable branch/unit/activity combination.
     */
    private function hasReservableCombination(User $user): bool
    {
        return Branch::query()
            ->where('user_id', $user->id)
            ->active()
            ->whereHas('units', function (Builder $unitQuery): void {
                $unitQuery->active()
                    ->whereHas('activities', function (Builder $activityQuery): void {
                        $activityQuery->active();
                    });
            })
            ->exists();
    }

    /**
     * Get active public branches that contain at least one reservable unit/activity combination.
     *
     * @return array<int, array<string, mixed>>
     */
    private function getActiveBranches(User $user): array
    {
        return Branch::query()
            ->select([
                'id',
                'public_id',
                'name',
                'address_line_1',
                'address_line_2',
                'city',
                'postcode',
                'country_code',
                'timezone',
            ])
            ->where('user_id', $user->id)
            ->active()
            ->whereHas('units', function (Builder $unitQuery): void {
                $unitQuery->active()
                    ->whereHas('activities', function (Builder $activityQuery): void {
                        $activityQuery->active();
                    });
            })
            ->orderBy('name')
            ->get()
            ->map(fn (Branch $branch): array => [
                'id' => $branch->id,
                'public_id' => $branch->public_id,
                'name' => $branch->name,
                'address_line_1' => $branch->address_line_1,
                'address_line_2' => $branch->address_line_2,
                'city' => $branch->city,
                'postcode' => $branch->postcode,
                'country_code' => $branch->country_code,
                'timezone' => $branch->timezone,
            ])
            ->values()
            ->all();
    }
}