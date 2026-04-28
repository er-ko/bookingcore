<?php

namespace App\Support\Translations;

final class HomeTranslations
{
    /**
     * Get all translations required for the homepage.
     *
     * @return array<string, mixed>
     */
    public static function index(): array
    {
        return [
            'meta' => self::meta(),
            'hero' => self::hero(),
            'features' => self::features(),
            'open_access' => self::openAccess(),
            'audience' => self::audience(),
            'closing' => self::closing(),
        ];
    }

    /**
     * Meta translations.
     *
     * @return array<string, string>
     */
    private static function meta(): array
    {
        return [
            'title' => __('home.meta.title'),
            'description' => __('home.meta.description'),
        ];
    }

    /**
     * Hero section translations.
     *
     * @return array<string, mixed>
     */
    private static function hero(): array
    {
        return [
            'badge' => __('home.hero.badge'),

            'title' => [
                'line_1' => __('home.hero.title.line_1'),
                'line_2' => __('home.hero.title.line_2'),
                'line_3' => __('home.hero.title.line_3'),
            ],

            'description' => __('home.hero.description'),

            'actions' => [
                'get_started' => __('home.hero.actions.get_started'),
                'view_github' => __('home.hero.actions.view_github'),
            ],

            'tags' => [
                'mit_license' => __('home.hero.tags.mit_license'),
                'public_code' => __('home.hero.tags.public_code'),
                'copyright' => __('home.hero.tags.copyright'),
            ],

            'bridge' => [
                'customer' => __('home.hero.bridge.customer'),
                'engine' => __('home.hero.bridge.engine'),
                'calendar' => __('home.hero.bridge.calendar'),
            ],
        ];
    }

    /**
     * Feature grid translations.
     *
     * @return array<string, array<string, string>>
     */
    private static function features(): array
    {
        return [
            'structure' => [
                'title' => __('home.features.structure.title'),
                'description' => __('home.features.structure.description'),
            ],
            'control' => [
                'title' => __('home.features.control.title'),
                'description' => __('home.features.control.description'),
            ],
            'delivery' => [
                'title' => __('home.features.delivery.title'),
                'description' => __('home.features.delivery.description'),
            ],
        ];
    }

    /**
     * Open access section translations.
     *
     * @return array<string, mixed>
     */
    private static function openAccess(): array
    {
        return [
            'badge' => __('home.open_access.badge'),
            'title' => __('home.open_access.title'),
            'description' => __('home.open_access.description'),

            'tags' => [
                'subscription' => __('home.open_access.tags.subscription'),
                'codebase' => __('home.open_access.tags.codebase'),
            ],

            'highlight' => [
                'eyebrow' => __('home.open_access.highlight.eyebrow'),
                'title' => __('home.open_access.highlight.title'),
                'badge' => __('home.open_access.highlight.badge'),
                'description' => __('home.open_access.highlight.description'),
            ],

            'points' => [
                'access' => [
                    'title' => __('home.open_access.points.access.title'),
                    'value' => __('home.open_access.points.access.value'),
                ],
                'code' => [
                    'title' => __('home.open_access.points.code.title'),
                    'value' => __('home.open_access.points.code.value'),
                ],
                'control' => [
                    'title' => __('home.open_access.points.control.title'),
                    'value' => __('home.open_access.points.control.value'),
                ],
            ],

            'cards' => [
                'why_it_matters' => [
                    'title' => __('home.open_access.cards.why_it_matters.title'),
                    'description' => __('home.open_access.cards.why_it_matters.description'),
                ],
                'practical_outcome' => [
                    'title' => __('home.open_access.cards.practical_outcome.title'),
                    'description' => __('home.open_access.cards.practical_outcome.description'),
                ],
            ],
        ];
    }

    /**
     * Audience section translations.
     *
     * @return array<string, mixed>
     */
    private static function audience(): array
    {
        return [
            'eyebrow' => __('home.audience.eyebrow'),
            'title' => __('home.audience.title'),
            'description' => __('home.audience.description'),

            'insights' => [
                'daily_reality' => [
                    'title' => __('home.audience.insights.daily_reality.title'),
                    'description' => __('home.audience.insights.daily_reality.description'),
                ],
                'common_thread' => [
                    'title' => __('home.audience.insights.common_thread.title'),
                    'description' => __('home.audience.insights.common_thread.description'),
                ],
            ],

            'items' => [
                'healthcare' => [
                    'eyebrow' => __('home.audience.items.healthcare.eyebrow'),
                    'title' => __('home.audience.items.healthcare.title'),
                    'description' => __('home.audience.items.healthcare.description'),
                ],
                'beauty' => [
                    'eyebrow' => __('home.audience.items.beauty.eyebrow'),
                    'title' => __('home.audience.items.beauty.title'),
                    'description' => __('home.audience.items.beauty.description'),
                ],
                'sport' => [
                    'eyebrow' => __('home.audience.items.sport.eyebrow'),
                    'title' => __('home.audience.items.sport.title'),
                    'description' => __('home.audience.items.sport.description'),
                ],
                'service_operations' => [
                    'eyebrow' => __('home.audience.items.service_operations.eyebrow'),
                    'title' => __('home.audience.items.service_operations.title'),
                    'description' => __('home.audience.items.service_operations.description'),
                ],
            ],
        ];
    }

    /**
     * Closing section translations.
     *
     * @return array<string, mixed>
     */
    private static function closing(): array
    {
        return [
            'badge' => __('home.closing.badge'),
            'title' => __('home.closing.title'),
            'description' => __('home.closing.description'),

            'tags' => [
                'open_source' => __('home.closing.tags.open_source'),
                'mit_license' => __('home.closing.tags.mit_license'),
                'public_code' => __('home.closing.tags.public_code'),
                'booking_infrastructure' => __('home.closing.tags.booking_infrastructure'),
            ],
        ];
    }
}
