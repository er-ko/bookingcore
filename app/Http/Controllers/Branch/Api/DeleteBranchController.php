<?php

namespace App\Http\Controllers\Branch\Api;

use App\Application\Branch\Actions\DeleteBranch;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\JsonResponse;
use RuntimeException;

final class DeleteBranchController extends Controller
{
    /**
     * Delete the given branch.
     */
    public function __invoke(Branch $branch, DeleteBranch $deleteBranch): JsonResponse
    {
        try {
            $deleteBranch(
                $this->user(),
                $branch->public_id,
            );
        } catch (RuntimeException $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
            ], 422);
        }

        return response()->json([
            'message' => __('branch.messages.deleted'),
        ], 200);
    }
}