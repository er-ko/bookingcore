<?php

namespace App\Http\Controllers\Region\Web;

use App\Application\Region\Currency\Actions\UpdateCurrencyStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Region\UpdateCurrencyStatusRequest;
use Illuminate\Http\RedirectResponse;

final class CurrencyStatusController extends Controller
{
    /**
     * Update user-specific currency activation status.
     */
    public function __invoke(
        UpdateCurrencyStatusRequest $request,
        UpdateCurrencyStatus $action
    ): RedirectResponse {
        $action(
            user: $this->user(),
            scope: $request->scopeValue(),
            isActive: $request->isActiveValue(),
            currencyIds: $request->currencyIds(),
        );

        return redirect()
            ->route('region.currencies.index')
            ->with('success', __('region/currency.messages.updated'));
    }
}
