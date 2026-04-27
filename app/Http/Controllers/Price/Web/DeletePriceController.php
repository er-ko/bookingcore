<?php

namespace App\Http\Controllers\Price\Web;

use App\Application\Price\Actions\DeletePrice;
use App\Http\Controllers\Controller;
use App\Models\Price;
use Illuminate\Http\JsonResponse;
use RuntimeException;

final class DeletePriceController extends Controller
{
    /**
     * Delete the given price.
     */
    public function __invoke(
        Price $price,
        DeletePrice $deletePrice,
    ): JsonResponse {
        try {
            $deletePrice(
                user: $this->user(),
                price: $price,
            );
        } catch (RuntimeException $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
            ], 422);
        }

        return response()->json([
            'message' => __('price.messages.deleted'),
        ], 200);
    }
}