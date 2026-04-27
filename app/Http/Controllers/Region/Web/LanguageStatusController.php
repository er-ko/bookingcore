<?php

namespace App\Http\Controllers\Region\Web;

use App\Application\Region\Language\Actions\UpdateLanguageStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Region\UpdateLanguageStatusRequest;
use Illuminate\Http\RedirectResponse;

final class LanguageStatusController extends Controller
{
    /**
     * Update user-specific language activation status.
     */
    public function __invoke(
        UpdateLanguageStatusRequest $request,
        UpdateLanguageStatus $action
    ): RedirectResponse {
        $action(
            user: $this->user(),
            scope: $request->scopeValue(),
            isActive: $request->isActiveValue(),
            languageIds: $request->languageIds(),
        );

        return redirect()
            ->route('region.languages.index')
            ->with('success', __('region/language.messages.updated'));
    }
}
