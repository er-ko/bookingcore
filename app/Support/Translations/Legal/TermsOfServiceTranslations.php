<?php

namespace App\Support\Translations\Legal;

final class TermsOfServiceTranslations
{
    /**
     * @return array<string, mixed>
     */
    public static function page(): array
    {
        return [
            'meta' => self::meta(),
            'badge' => __('legal/terms-of-service.badge'),
            'title' => __('legal/terms-of-service.title'),
            'updated' => __('legal/terms-of-service.updated'),
            'intro' => __('legal/terms-of-service.intro'),
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
            'title' => __('legal/terms-of-service.meta.title'),
            'description' => __('legal/terms-of-service.meta.description'),
        ];
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    private static function sections(): array
    {
        return [
            [
                'title' => __('legal/terms-of-service.sections.the_service.title'),
                'body' => [
                    __('legal/terms-of-service.sections.the_service.body_1'),
                    __('legal/terms-of-service.sections.the_service.body_2'),
                ],
            ],
            [
                'title' => __('legal/terms-of-service.sections.accounts_and_access.title'),
                'body' => [
                    __('legal/terms-of-service.sections.accounts_and_access.body_1'),
                    __('legal/terms-of-service.sections.accounts_and_access.body_2'),
                ],
            ],
            [
                'title' => __('legal/terms-of-service.sections.calendar_integrations.title'),
                'body' => [
                    __('legal/terms-of-service.sections.calendar_integrations.body_1'),
                    __('legal/terms-of-service.sections.calendar_integrations.body_2'),
                ],
            ],
            [
                'title' => __('legal/terms-of-service.sections.acceptable_use.title'),
                'body' => [
                    __('legal/terms-of-service.sections.acceptable_use.body_1'),
                    __('legal/terms-of-service.sections.acceptable_use.body_2'),
                ],
            ],
            [
                'title' => __('legal/terms-of-service.sections.customer_and_booking_data.title'),
                'body' => [
                    __('legal/terms-of-service.sections.customer_and_booking_data.body_1'),
                    __('legal/terms-of-service.sections.customer_and_booking_data.body_2'),
                ],
            ],
            [
                'title' => __('legal/terms-of-service.sections.availability_and_changes.title'),
                'body' => [
                    __('legal/terms-of-service.sections.availability_and_changes.body_1'),
                ],
            ],
            [
                'title' => __('legal/terms-of-service.sections.open_source_code.title'),
                'body' => [
                    __('legal/terms-of-service.sections.open_source_code.body_1'),
                ],
            ],
            [
                'title' => __('legal/terms-of-service.sections.disclaimer.title'),
                'body' => [
                    __('legal/terms-of-service.sections.disclaimer.body_1'),
                ],
            ],
            [
                'title' => __('legal/terms-of-service.sections.contact.title'),
                'body' => [
                    __('legal/terms-of-service.sections.contact.body_1'),
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
            ['label' => __('legal/terms-of-service.links.home'), 'href' => '/'],
            ['label' => __('legal/terms-of-service.links.privacy_policy'), 'href' => '/privacy-policy'],
        ];
    }
}
