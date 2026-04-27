<?php

namespace App\Application\Identity\Actions;

use App\Enums\BookingMode;
use App\Models\Identity\UserIdentitySettings;
use App\Models\User;

final class UpdateIdentityAction
{
    /**
     * Update or create identity settings for the given user.
     *
     * @param array{
     *     mode?: string,
     *     brand_name: string,
     *     slug: string,
     *     default_language_code?: string|null,
     *     default_currency_code?: string|null,
     *     default_country_code?: string|null,
     *     is_public: bool
     * } $data
     */
    public function __invoke(User $user, array $data): UserIdentitySettings
    {
        return UserIdentitySettings::query()->updateOrCreate(
            [
                'user_id' => $user->id,
            ],
            [
                'mode' => $data['mode'] ?? BookingMode::Services->value,
                'brand_name' => $data['brand_name'],
                'slug' => $data['slug'],
                'default_language_code' => $data['default_language_code'] ?? null,
                'default_currency_code' => $data['default_currency_code'] ?? null,
                'default_country_code' => $data['default_country_code'] ?? null,
                'is_public' => (bool) $data['is_public'],
            ]
        );
    }
}