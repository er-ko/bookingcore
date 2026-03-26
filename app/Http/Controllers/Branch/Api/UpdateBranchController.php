<?php

namespace App\Http\Controllers\Branch\Api;

use App\Application\Branch\Actions\UpdateBranch;
use App\Http\Controllers\Controller;
use App\Http\Requests\Branch\UpdateBranchRequest;
use App\Models\Branch;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

final class UpdateBranchController extends Controller
{
    /**
     * Update the given branch.
     */
    public function __invoke(
        UpdateBranchRequest $request,
        Branch $branch,
        UpdateBranch $updateBranch,
    ): JsonResponse {
        try {
            $updatedBranch = $updateBranch(
                $this->user(),
                $branch->public_id,
                $request->toDTO(),
            );
        } catch (ModelNotFoundException) {
            return response()->json([
                'message' => __('branch.messages.not_found'),
            ], 404);
        }

        return response()->json([
            'message' => __('branch.messages.updated'),
            'data' => $updatedBranch,
        ], 200);
    }
}