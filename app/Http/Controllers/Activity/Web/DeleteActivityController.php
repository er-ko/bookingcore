<?php

namespace App\Http\Controllers\Activity\Web;

use App\Application\Activity\Actions\DeleteActivity;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\RedirectResponse;
use RuntimeException;

final class DeleteActivityController extends Controller
{
    /**
     * Delete the given activity.
     */
    public function __invoke(
        Activity $activity,
        DeleteActivity $deleteActivity
    ): RedirectResponse {
        try {
            $deleteActivity(
                $this->user(),
                $activity->public_id,
            );
        } catch (RuntimeException $exception) {
            return redirect()
                ->route('activities.index')
                ->with('error', $exception->getMessage() ?: __('activity.messages.failed'));
        }

        return redirect()
            ->route('activities.index')
            ->with('success', __('activity.messages.deleted'));
    }
}
