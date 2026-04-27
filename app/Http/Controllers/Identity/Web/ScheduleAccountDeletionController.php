<?php

namespace App\Http\Controllers\Identity\Web;

use App\Application\Identity\Actions\ScheduleAccountDeletionAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final class ScheduleAccountDeletionController extends Controller
{
    /**
     * Schedule deletion of the authenticated user's account.
     */
    public function __invoke(
        Request $request,
        ScheduleAccountDeletionAction $action,
    ): RedirectResponse {
        $action($request->user());

        return redirect()
            ->route('identity.index')
            ->with('success', __('identity.messages.deletion_scheduled'));
    }
}