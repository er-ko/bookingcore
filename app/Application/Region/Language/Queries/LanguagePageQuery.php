<?php

namespace App\Application\Region\Language\Queries;

use App\Domain\Region\Services\UserRegionSettingsService;
use App\Models\Region\Language;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Query object responsible for retrieving language data
 * required by language-related UI pages.
 */
final class LanguagePageQuery
{
    public function __construct(
        private readonly UserRegionSettingsService $userRegionSettingsService,
    ) {
    }

    /**
     * Retrieve language list data for the language index page.
     *
     * @return LengthAwarePaginator<int, Language>
     */
    public function getList(
        User $user
    ): LengthAwarePaginator {
        $activeLanguageCodes = $this->userRegionSettingsService->activeLanguageCodes($user);

        $languages = Language::query()
            ->select([
                'id',
                'language_tag',
                'name',
                'local_name',
                'flag_emoji',
            ])
            ->orderBy('name')
            ->paginate(15);

        $languages->getCollection()->transform(
            function (Language $language) use ($activeLanguageCodes): Language {
                $language->setAttribute(
                    'is_active_for_user',
                    in_array(
                        (string) $language->language_tag,
                        $activeLanguageCodes,
                        true
                    )
                );

                return $language;
            }
        );

        return $languages;
    }
}