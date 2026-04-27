<?php

namespace App\Http\Controllers\Unit\Web;

use App\Application\Unit\Actions\StoreUnit;
use App\Http\Controllers\Controller;
use App\Http\Requests\Unit\StoreUnitRequest;
use Illuminate\Http\RedirectResponse;
use RuntimeException;

final class StoreUnitController extends Controller
{
    /**
     * Create a new unit.
     */
    public function __invoke(
        StoreUnitRequest $request,
        StoreUnit $storeUnit
    ): RedirectResponse {
        try {
            $storeUnit(
                $this->user(),
                $request->toDTO(),
            );
        } catch (RuntimeException $exception) {
            return redirect()
                ->route('units.index')
                ->with('error', $exception->getMessage() ?: __('unit.messages.failed'));
        }
        return redirect()
            ->route('units.index')
            ->with('success', __('unit.messages.created'));
    }
}
