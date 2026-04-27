<?php

namespace App\Http\Controllers\Unit\Web;

use App\Application\Unit\Actions\UpdateUnit;
use App\Http\Controllers\Controller;
use App\Http\Requests\Unit\UpdateUnitRequest;
use App\Models\Unit;
use Illuminate\Http\RedirectResponse;
use RuntimeException;

final class UpdateUnitController extends Controller
{
    /**
     * Update the given unit.
     */
    public function __invoke(
        UpdateUnitRequest $request,
        Unit $unit,
        UpdateUnit $updateUnit,
    ): RedirectResponse {
        try {
            $updateUnit(
                $this->user(),
                $unit->public_id,
                $request->toDTO(),
            );
        } catch (RuntimeException $exception) {
            return redirect()
                ->route('units.index')
                ->with('error', $exception->getMessage() ?: __('unit.messages.failed'));
        }

        return redirect()
            ->route('units.index')
            ->with('success', __('unit.messages.updated'));
    }
}
