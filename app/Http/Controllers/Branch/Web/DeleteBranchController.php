<?php

namespace App\Http\Controllers\Branch\Web;

use App\Application\Branch\Actions\DeleteBranch;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\RedirectResponse;
use RuntimeException;

final class DeleteBranchController extends Controller
{
    /**
     * Delete the given branch.
     */
    public function __invoke(
        Branch $branch,
        DeleteBranch $deleteBranch
    ): RedirectResponse {
        try {
            $deleteBranch(
                $this->user(),
                $branch->public_id,
            );
        } catch (RuntimeException $exception) {
            return redirect()
                ->route('branches.index')
                ->with('error', $exception->getMessage() ?: __('branch.messages.failed'));
        }

        return redirect()
            ->route('branches.index')
            ->with('success', __('branch.messages.deleted'));
    }
}
