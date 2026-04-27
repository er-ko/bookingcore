<?php

namespace App\Application\Identity\Queries;

use App\Models\Identity\UserIdentitySettings;
use App\Models\Region\Country;
use App\Models\Region\Currency;
use App\Models\Region\Language;
use App\Models\User;

final class IdentityPageQuery
{
    /**
     * Get all data required for the Identity page.
     *
     * @return array<string, mixed>
     */
    public function get(User $user): array
    {
        $identity = UserIdentitySettings::query()
            ->where('user_id', $user->id)
            ->first();

        return [
            'identity' => [
                'mode' => $identity?->mode ?? 'services',
                'brand_name' => $identity?->brand_name ?? $user->name,
                'slug' => $identity?->slug ?? '',
                'default_language_code' => $identity?->default_language_code,
                'default_currency_code' => $identity?->default_currency_code,
                'default_country_code' => $identity?->default_country_code,
                'is_public' => $identity?->is_public ?? false,
            ],

            'accountDeletion' => [
                'has_pending_deletion' => $user->hasPendingDeletion(),
                'delete_requested_at' => $user->delete_requested_at?->toDateTimeString(),
                'deletion_scheduled_for' => $user->deletion_scheduled_for?->toDateTimeString(),
            ],

            'languages' => Language::query()
                ->select(['language_tag', 'name', 'local_name', 'flag_emoji'])
                ->orderBy('name')
                ->get(),

            'currencies' => Currency::query()
                ->select(['currency_code', 'name', 'flag_emoji', 'symbol_prefix', 'symbol_suffix'])
                ->orderBy('name')
                ->get(),

            'countries' => Country::query()
                ->select(['iso_alpha2', 'name', 'official_name', 'flag_emoji'])
                ->orderBy('official_name')
                ->get(),
        ];
    }
}