<?php

namespace App\Http\Controllers\Branch\Web;

use App\Application\Branch\Actions\StoreBranch;
use App\Http\Controllers\Controller;
use App\Http\Requests\Branch\StoreBranchRequest;
use Illuminate\Http\RedirectResponse;
use RuntimeException;

final class StoreBranchController extends Controller
{
    /**
     * Create a new branch.
     */
    public function __invoke(
        StoreBranchRequest $request,
        StoreBranch $storeBranch
    ): RedirectResponse {
        try {
            $storeBranch(
                $this->user(),
                $request->toDTO(),
            );
        } catch (RuntimeException $exception) {
            return redirect()
                ->route('branches.index')
                ->with('error', $exception->getMessage() ?: __('branch.messages.failed'));
        }

        return redirect()
            ->route('branches.index')
            ->with('success', __('branch.messages.created'));
    }
}
