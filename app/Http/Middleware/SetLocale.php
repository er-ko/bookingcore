<?php

namespace App\Http\Middleware;

use App\Support\Locale\LocaleResolver;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpFoundation\Response;

final readonly class SetLocale
{
    public function __construct(
        private LocaleResolver $locales,
    ) {
    }

    /**
     * Set the application locale for web requests.
     *
     * @param  Closure(Request): Response  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $this->locales->supportedOrFallback(
            $request->session()->get('locale')
        );

        if (! $request->session()->has('locale')) {
            $locale = $this->locales->seedLocaleFor($request);

            $request->session()->put('locale', $locale);
        } elseif ($locale !== $request->session()->get('locale')) {
            $request->session()->put('locale', $locale);
        }

        app()->setLocale($locale);
        Carbon::setLocale($locale);

        return $next($request);
    }
}
