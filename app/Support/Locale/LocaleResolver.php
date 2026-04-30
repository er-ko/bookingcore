<?php

namespace App\Support\Locale;

use App\Models\Identity\UserIdentitySettings;
use App\Models\Region\Language;
use Illuminate\Http\Request;

final class LocaleResolver
{
    /**
     * @var array<string, array<string, mixed>>|null
     */
    private ?array $supportedLocales = null;

    /**
     * Resolve the locale that should seed a new session.
     */
    public function seedLocaleFor(Request $request): string
    {
        return $this->publicBookingLocale($request)
            ?? $this->browserLocale($request)
            ?? $this->fallbackLocale();
    }

    /**
     * Determine whether the locale can be used by the application.
     */
    public function isSupported(?string $locale): bool
    {
        return $this->canonicalLocale($locale) !== null;
    }

    /**
     * Return a supported locale or the configured fallback locale.
     */
    public function supportedOrFallback(?string $locale): string
    {
        $canonicalLocale = $this->canonicalLocale($locale);

        if ($canonicalLocale !== null) {
            return $canonicalLocale;
        }

        return $this->fallbackLocale();
    }

    /**
     * Get all supported locale codes.
     *
     * @return array<int, string>
     */
    public function supportedLocaleCodes(): array
    {
        return array_keys($this->supportedLocales());
    }

    /**
     * Get supported locales formatted for Inertia shared props.
     *
     * @return array<string, array<string, mixed>>
     */
    public function supportedLocalesForDisplay(): array
    {
        return $this->supportedLocales();
    }

    /**
     * Resolve the public booking owner locale from the current @slug route.
     */
    private function publicBookingLocale(Request $request): ?string
    {
        if (! $request->routeIs('public-booking.*')) {
            return null;
        }

        $slug = $request->route('slug');

        if (! is_string($slug) || $slug === '') {
            return null;
        }

        $locale = UserIdentitySettings::query()
            ->where('slug', $slug)
            ->value('default_language_code');

        return $this->canonicalLocale($locale);
    }

    /**
     * Resolve the browser preferred locale when it is supported.
     */
    private function browserLocale(Request $request): ?string
    {
        $locale = $request->getPreferredLanguage($this->supportedLocaleCodes());

        return $this->canonicalLocale($locale);
    }

    /**
     * Normalize locale tags for comparison.
     */
    private function normalize(?string $locale): ?string
    {
        if ($locale === null || $locale === '') {
            return null;
        }

        return str_replace('_', '-', trim($locale));
    }

    /**
     * Return the database-canonical locale tag when supported.
     */
    private function canonicalLocale(?string $locale): ?string
    {
        $normalizedLocale = $this->normalize($locale);

        if ($normalizedLocale === null) {
            return null;
        }

        foreach ($this->supportedLocaleCodes() as $supportedLocale) {
            if (strtolower($supportedLocale) === strtolower($normalizedLocale)) {
                return $supportedLocale;
            }
        }

        return null;
    }

    /**
     * Resolve the application's fallback locale.
     */
    private function fallbackLocale(): string
    {
        $fallbackLocale = config('app.fallback_locale', 'en');
        $canonicalLocale = $this->canonicalLocale($fallbackLocale);

        return $canonicalLocale ?? 'en';
    }

    /**
     * @return array<string, array<string, mixed>>
     */
    private function supportedLocales(): array
    {
        if ($this->supportedLocales !== null) {
            return $this->supportedLocales;
        }

        return $this->supportedLocales = Language::query()
            ->active()
            ->orderBy('name')
            ->get([
                'language_tag',
                'name',
                'local_name',
                'flag_emoji',
                'flag_icon',
                'date_format',
                'time_format',
                'datetime_format',
                'hour_cycle',
                'decimal_separator',
                'thousands_separator',
            ])
            ->mapWithKeys(fn (Language $language): array => [
                $language->language_tag => [
                    'name' => $language->name,
                    'local_name' => $language->local_name,
                    'native_name' => $language->local_name,
                    'flag_emoji' => $language->flag_emoji,
                    'flag_icon' => $language->flag_icon,
                    'date_format' => $language->date_format,
                    'time_format' => $language->time_format,
                    'datetime_format' => $language->datetime_format,
                    'hour_cycle' => $language->hour_cycle,
                    'decimal_separator' => $language->decimal_separator,
                    'thousands_separator' => $language->thousands_separator,
                ],
            ])
            ->all();
    }
}
