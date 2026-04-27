<?php

namespace App\Http\Controllers\Branch\Web;

use App\Application\Branch\Actions\UpdateBranch;
use App\Http\Controllers\Controller;
use App\Http\Requests\Branch\UpdateBranchRequest;
use App\Models\Branch;
use Illuminate\Http\RedirectResponse;
use RuntimeException;

final class UpdateBranchController extends Controller
{
    /**
     * Update the given branch.
     */
    public function __invoke(
        UpdateBranchRequest $request,
        Branch $branch,
        UpdateBranch $updateBranch,
    ): RedirectResponse {
        try {
            $updateBranch(
                $this->user(),
                $branch->public_id,
                $request->toDTO(),
            );
        } catch (RuntimeException $exception) {
            return redirect()
                ->route('branches.index')
                ->with('error', $exception->getMessage() ?: __('branch.messages.failed'));
        }

        return redirect()
            ->route('branches.index')
            ->with('success', __('branch.messages.updated'));
    }
}
