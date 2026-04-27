<?php

namespace App\Http\Controllers\Identity\Web;

use App\Application\Identity\Actions\UpdateIdentityAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Identity\UpdateIdentityRequest;
use Illuminate\Http\RedirectResponse;

final class UpdateIdentityController extends Controller
{
    /**
     * Update the authenticated user's identity settings.
     */
    public function __invoke(
        UpdateIdentityRequest $request,
        UpdateIdentityAction $action
    ): RedirectResponse {
        $action(
            user: $this->user(),
            data: $request->validated(),
        );

        return redirect()
            ->route('identity.index')
            ->with('success', __('identity.messages.updated'));
    }
}