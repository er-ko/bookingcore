<?php

namespace App\Http\Controllers\Activity\Web;

use App\Application\Activity\Actions\StoreActivity;
use App\Http\Controllers\Controller;
use App\Http\Requests\Activity\StoreActivityRequest;
use Illuminate\Http\RedirectResponse;
use RuntimeException;

final class StoreActivityController extends Controller
{
    /**
     * Create a new activity.
     */
    public function __invoke(
        StoreActivityRequest $request,
        StoreActivity $storeActivity
    ): RedirectResponse {
        try {
            $storeActivity(
                $this->user(),
                $request->toDTO(),
            );
        } catch (RuntimeException $exception) {
            return redirect()
                ->route('activities.index')
                ->with('error', $exception->getMessage() ?: __('activity.messages.failed'));
        }

        return redirect()
            ->route('activities.index')
            ->with('success', __('activity.messages.created'));
    }
}