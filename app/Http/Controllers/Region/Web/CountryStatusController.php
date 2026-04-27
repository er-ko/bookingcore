<?php

namespace App\Http\Controllers\Region\Web;

use App\Application\Region\Country\Actions\UpdateCountryStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Region\UpdateCountryStatusRequest;
use Illuminate\Http\RedirectResponse;

final class CountryStatusController extends Controller
{
    /**
     * Update user-specific country activation status.
     */
    public function __invoke(
        UpdateCountryStatusRequest $request,
        UpdateCountryStatus $action
    ): RedirectResponse {
        $action(
            user: $this->user(),
            scope: $request->scopeValue(),
            isActive: $request->isActiveValue(),
            countryIds: $request->countryIds(),
        );

        return redirect()
            ->route('region.countries.index')
            ->with('success', __('region/country.messages.updated'));
    }
}
