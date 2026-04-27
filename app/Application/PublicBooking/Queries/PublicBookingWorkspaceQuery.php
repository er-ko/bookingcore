<?php

namespace App\Application\PublicBooking\Queries;

use App\Models\Identity\UserIdentitySettings;
use App\Models\User;

final class PublicBookingWorkspaceQuery
{
    /**
     * Resolve the workspace owner by public slug.
     */
    public function getUser(string $slug): User
    {
        $identity = UserIdentitySettings::query()
            ->with('user')
            ->where('slug', $slug)
            ->firstOrFail();

        return $identity->user()->firstOrFail();
    }
}