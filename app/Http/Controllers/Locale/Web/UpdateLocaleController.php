<?php

namespace App\Http\Controllers\Locale\Web;

use App\Http\Controllers\Controller;
use App\Support\Locale\LocaleResolver;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

final class UpdateLocaleController extends Controller
{
    /**
     * Update the active locale for the current session.
     */
    public function __invoke(Request $request, LocaleResolver $locales): RedirectResponse
    {
        $validated = $request->validate([
            'locale' => [
                'required',
                'string',
                Rule::in($locales->supportedLocaleCodes()),
            ],
        ]);

        $request->session()->put('locale', $validated['locale']);

        return back();
    }
}
