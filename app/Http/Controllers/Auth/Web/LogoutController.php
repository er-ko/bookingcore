<?php

namespace App\Http\Controllers\Auth\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

final class LogoutController extends Controller
{
    /**
     * Log the current user out of the application.
     */
    public function __invoke(Request $request): RedirectResponse
    {
        $locale = $request->session()->get('locale');

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if (is_string($locale) && $locale !== '') {
            $request->session()->put('locale', $locale);
        }

        return redirect()->route('home');
    }
}
