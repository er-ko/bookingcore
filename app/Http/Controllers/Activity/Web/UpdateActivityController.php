<?php

namespace App\Http\Controllers\Activity\Web;

use App\Application\Activity\Actions\UpdateActivity;
use App\Http\Controllers\Controller;
use App\Http\Requests\Activity\UpdateActivityRequest;
use App\Models\Activity;
use Illuminate\Http\RedirectResponse;
use RuntimeException;

final class UpdateActivityController extends Controller
{
    /**
     * Update the given activity.
     */
    public function __invoke(
        UpdateActivityRequest $request,
        Activity $activity,
        UpdateActivity $updateActivity
    ): RedirectResponse {
        try {
            $updateActivity(
                $this->user(),
                $activity->public_id,
                $request->toDTO(),
            );
        } catch (RuntimeException $exception) {
            return redirect()
                ->route('activities.index')
                ->with('error', $exception->getMessage() ?: __('activity.messages.failed'));
        }

        return redirect()
            ->route('activities.index')
            ->with('success', __('activity.messages.updated'));
    }
}