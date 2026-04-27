<?php

namespace App\Http\Controllers\Price\Web;

use App\Application\Price\Actions\UpdatePrice;
use App\Http\Controllers\Controller;
use App\Http\Requests\Price\UpdatePriceRequest;
use App\Models\Price;
use Illuminate\Http\JsonResponse;
use RuntimeException;

final class UpdatePriceController extends Controller
{
    /**
     * Update the given price.
     */
    public function __invoke(
        UpdatePriceRequest $request,
        Price $price,
        UpdatePrice $updatePrice,
    ): JsonResponse {
        try {
            $updatedPrice = $updatePrice(
                user: $this->user(),
                price: $price,
                data: $request->validatedData(),
            );
        } catch (RuntimeException $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
            ], 422);
        }

        return response()->json([
            'message' => __('price.messages.updated'),
            'data' => [
                'id' => $updatedPrice->id,
                'price' => $updatedPrice->price,
            ],
        ], 200);
    }
}