<?php

namespace App\Http\Controllers\Identity\Web;

use App\Application\Identity\Actions\CancelAccountDeletionAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

final class CancelAccountDeletionController extends Controller
{
    /**
     * Cancel a previously scheduled account deletion.
     */
    public function __invoke(
        CancelAccountDeletionAction $action,
    ): RedirectResponse {
        $action($this->user());

        return redirect()
            ->route('identity.index')
            ->with('success', __('identity.messages.deletion_canceled'));
    }
}