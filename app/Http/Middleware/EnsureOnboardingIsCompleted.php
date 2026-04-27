<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final class EnsureOnboardingIsCompleted
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (! $user) {
            return $next($request);
        }

        if (! $user->hasCompletedIdentity()) {
            if ($request->routeIs('identity.*', 'api.identity.*', 'logout')) {
                return $next($request);
            }

            return redirect()->route('identity.index');
        }

        if (! $user->hasCompletedCalendarIntegration()) {
            if ($request->routeIs(
                'identity.*',
                'api.identity.*',
                'integrations.calendar.*',
                'logout',
            )) {
                return $next($request);
            }

            return redirect()->route('integrations.calendar.index');
        }

        return $next($request);
    }
}