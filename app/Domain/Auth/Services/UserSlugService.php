<?php

namespace App\Domain\Auth\Services;

use App\Models\Identity\UserIdentitySettings;
use Illuminate\Support\Str;

final class UserSlugService
{
    /**
     * Generate a unique random slug for public booking pages.
     */
    public function generateUniqueSlug(int $length = 10): string
    {
        do {
            $slug = Str::lower(Str::random($length));
        } while ($this->slugExists($slug));

        return $slug;
    }

    private function slugExists(string $slug): bool
    {
        return UserIdentitySettings::query()
            ->where('slug', $slug)
            ->exists();
    }
}