<?php

namespace App\Http\Controllers\Branch\Api;

use App\Application\Branch\Actions\StoreBranch;
use App\Http\Controllers\Controller;
use App\Http\Requests\Branch\StoreBranchRequest;
use Illuminate\Http\JsonResponse;
use RuntimeException;

final class StoreBranchController extends Controller
{
    /**
     * Create a new branch.
     */
    public function __invoke(StoreBranchRequest $request, StoreBranch $storeBranch): JsonResponse
    {
        try {
            $branch = $storeBranch(
                $this->user(),
                $request->toDTO(),
            );
        } catch (RuntimeException $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
            ], 422);
        }

        return response()->json([
            'message' => __('branch.messages.created'),
            'data' => $branch,
        ], 201);
    }
}