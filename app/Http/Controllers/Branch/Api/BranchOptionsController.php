<?php

namespace App\Http\Controllers\Branch\Api;

use App\Application\Branch\Queries\BranchFormOptionsQuery;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use RuntimeException;

final class BranchOptionsController extends Controller
{
    /**
     * Return available timezones for the selected country.
     */
    public function timezones(Request $request, BranchFormOptionsQuery $branchFormOptionsQuery): JsonResponse
    {
        $validated = $request->validate([
            'country_code' => ['required', 'string', 'size:2'],
        ]);

        try {
            $timezones = $branchFormOptionsQuery->getTimezonesForCountry(
                $validated['country_code'],
            );
        } catch (RuntimeException $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
                'data' => [],
            ], 404);
        }

        return response()->json([
            'data' => $timezones,
        ], 200);
    }
}