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
     * When the booking mode changes, the entire workspace is reset
     * before the new mode is saved.
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
        $newMode = $data['mode'] ?? BookingMode::Services->value;

        $currentMode = UserIdentitySettings::where('user_id', $user->id)->value('mode');

        if ($currentMode !== null && $currentMode !== $newMode) {
            new ResetWorkspaceAction()($user);
        }

        return UserIdentitySettings::query()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'mode' => $newMode,
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
