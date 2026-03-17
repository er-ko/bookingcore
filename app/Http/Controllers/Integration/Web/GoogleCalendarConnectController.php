<?php

namespace App\Http\Controllers\Integration\Web;

use App\Application\Integration\Actions\HandleGoogleCalendarCallback;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

final class GoogleCalendarConnectController extends Controller
{
    /**
     * Redirect the authenticated user to the Google Calendar OAuth consent screen.
     */
    public function redirect(): RedirectResponse
    {
        config([
            'services.google.redirect' => route('integrations.calendar.google.callback'),
        ]);

        return Socialite::driver('google')
            ->stateless()
            ->scopes([
                'https://www.googleapis.com/auth/calendar',
            ])
            ->with([
                'access_type' => 'offline',
                'prompt' => 'consent',
            ])
            ->redirect();
    }

    /**
     * Handle the Google Calendar OAuth callback.
     */
    public function callback(HandleGoogleCalendarCallback $handleGoogleCalendarCallback): RedirectResponse
    {
        config([
            'services.google.redirect' => route('integrations.calendar.google.callback'),
        ]);

        $googleUser = Socialite::driver('google')
            ->stateless()
            ->user();

        /** @var User $user */
        $user = Auth::user();

        $handleGoogleCalendarCallback($user, $googleUser);

        return redirect()->route('integrations.calendar.index');
    }
}