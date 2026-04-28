<?php

namespace App\Support\Translations;

final class ConnectTranslations
{
    public static function page(): array
    {
        return [
            'title' => __('connect.view.title'),
            'heading' => __('connect.view.heading'),
            'description' => __('connect.view.description'),
            'meta_title' => __('connect.view.meta_title'),
            'meta_description' => __('connect.view.meta_description'),
            'provider' => self::provider(),
            'flow' => self::flow(),
            'tags' => self::tags(),
        ];
    }

    private static function provider(): array
    {
        return [
            'google_badge' => __('connect.view.provider.google_badge'),
            'title' => __('connect.view.provider.title'),
            'description' => __('connect.view.provider.description'),
            'protocol' => __('connect.view.provider.protocol'),
            'action' => __('connect.view.provider.action'),
        ];
    }

    private static function flow(): array
    {
        return [
            'title' => __('connect.view.flow.title'),
            'step_1' => __('connect.view.flow.step_1'),
            'step_2' => __('connect.view.flow.step_2'),
            'step_3' => __('connect.view.flow.step_3'),
        ];
    }

    private static function tags(): array
    {
        return [
            'google' => __('connect.view.tags.google'),
            'oauth' => __('connect.view.tags.oauth'),
            'calendar_sync' => __('connect.view.tags.calendar_sync'),
            'availability' => __('connect.view.tags.availability'),
            'booking_events' => __('connect.view.tags.booking_events'),
        ];
    }
}
