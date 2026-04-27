<?php

namespace App\Http\Controllers\Unit\Web;

use App\Application\Unit\Actions\DeleteUnit;
use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\RedirectResponse;
use RuntimeException;

final class DeleteUnitController extends Controller
{
    /**
     * Delete the given unit.
     */
    public function __invoke(
        Unit $unit,
        DeleteUnit $deleteUnit
    ): RedirectResponse {
        try {
            $deleteUnit(
                $this->user(),
                $unit->public_id,
            );
        } catch (RuntimeException $exception) {
            return redirect()
            ->route('units.index')
            ->with('error', $exception->getMessage() ?: __('unit.messages.failed'));
        }

        return redirect()
            ->route('units.index')
            ->with('success', __('unit.messages.deleted'));
    }
}
