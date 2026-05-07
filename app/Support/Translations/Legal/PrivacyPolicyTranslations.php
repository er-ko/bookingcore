<?php

namespace App\Support\Translations\Legal;

final class PrivacyPolicyTranslations
{
    /**
     * @return array<string, mixed>
     */
    public static function page(): array
    {
        return [
            'meta' => self::meta(),
            'badge' => __('legal/privacy-policy.badge'),
            'title' => __('legal/privacy-policy.title'),
            'updated' => __('legal/privacy-policy.updated'),
            'intro' => __('legal/privacy-policy.intro'),
            'sections' => self::sections(),
            'links' => self::links(),
        ];
    }

    /**
     * @return array<string, string>
     */
    private static function meta(): array
    {
        return [
            'title' => __('legal/privacy-policy.meta.title'),
            'description' => __('legal/privacy-policy.meta.description'),
        ];
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    private static function sections(): array
    {
        return [
            [
                'title' => __('legal/privacy-policy.sections.who_operates.title'),
                'body' => [
                    __('legal/privacy-policy.sections.who_operates.body_1'),
                ],
            ],
            [
                'title' => __('legal/privacy-policy.sections.information_we_process.title'),
                'body' => [
                    __('legal/privacy-policy.sections.information_we_process.body_1'),
                    __('legal/privacy-policy.sections.information_we_process.body_2'),
                    __('legal/privacy-policy.sections.information_we_process.body_3'),
                ],
            ],
            [
                'title' => __('legal/privacy-policy.sections.how_information_is_used.title'),
                'body' => [
                    __('legal/privacy-policy.sections.how_information_is_used.body_1'),
                    __('legal/privacy-policy.sections.how_information_is_used.body_2'),
                ],
            ],
            [
                'title' => __('legal/privacy-policy.sections.google_calendar_integration.title'),
                'body' => [
                    __('legal/privacy-policy.sections.google_calendar_integration.body_1'),
                    __('legal/privacy-policy.sections.google_calendar_integration.body_2'),
                    __('legal/privacy-policy.sections.google_calendar_integration.body_3'),
                ],
            ],
            [
                'title' => __('legal/privacy-policy.sections.data_sharing.title'),
                'body' => [
                    __('legal/privacy-policy.sections.data_sharing.body_1'),
                    __('legal/privacy-policy.sections.data_sharing.body_2'),
                    __('legal/privacy-policy.sections.data_sharing.body_3'),
                ],
            ],
            [
                'title' => __('legal/privacy-policy.sections.retention_and_deletion.title'),
                'body' => [
                    __('legal/privacy-policy.sections.retention_and_deletion.body_1'),
                    __('legal/privacy-policy.sections.retention_and_deletion.body_2'),
                ],
            ],
            [
                'title' => __('legal/privacy-policy.sections.security.title'),
                'body' => [
                    __('legal/privacy-policy.sections.security.body_1'),
                    __('legal/privacy-policy.sections.security.body_2'),
                ],
            ],
            [
                'title' => __('legal/privacy-policy.sections.your_choices.title'),
                'body' => [
                    __('legal/privacy-policy.sections.your_choices.body_1'),
                    __('legal/privacy-policy.sections.your_choices.body_2'),
                ],
            ],
            [
                'title' => __('legal/privacy-policy.sections.changes.title'),
                'body' => [
                    __('legal/privacy-policy.sections.changes.body_1'),
                ],
            ],
        ];
    }

    /**
     * @return array<int, array<string, string>>
     */
    private static function links(): array
    {
        return [
            ['label' => __('legal/privacy-policy.links.home'), 'href' => '/'],
            ['label' => __('legal/privacy-policy.links.terms_of_service'), 'href' => '/terms-of-service'],
        ];
    }
}
