<?php

namespace App\Http\Controllers\Auth\Web;

use App\Application\Auth\Actions\HandleOAuthCallback;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

final class GoogleAuthController extends Controller
{
    /**
     * Redirect the user to the Google OAuth consent screen.
     */
    public function redirect(): RedirectResponse
    {
        return Socialite::driver('google')
            ->scopes([
                'openid',
                'profile',
                'email',
            ])
            ->with([
                'access_type' => 'offline',
                'prompt' => 'consent',
            ])
            ->redirect();
    }

    /**
     * Handle the callback returned by Google OAuth.
     */
    public function callback(HandleOAuthCallback $handleOAuthCallback): RedirectResponse
    {
        $user = $handleOAuthCallback('google');

        Auth::login($user, true);

        return redirect()->route('dashboard.index');
    }
}