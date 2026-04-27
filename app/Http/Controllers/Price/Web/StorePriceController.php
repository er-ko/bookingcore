<?php

namespace App\Http\Controllers\Price\Web;

use App\Application\Price\Actions\StorePrice;
use App\Http\Controllers\Controller;
use App\Http\Requests\Price\StorePriceRequest;
use Illuminate\Http\JsonResponse;
use RuntimeException;

final class StorePriceController extends Controller
{
    /**
     * Store a new price.
     */
    public function __invoke(
        StorePriceRequest $request,
        StorePrice $storePrice,
    ): JsonResponse {
        try {
            $price = $storePrice(
                user: $this->user(),
                data: $request->validatedData(),
            );
        } catch (RuntimeException $exception) {
            return response()->json([
                'message' => $exception->getMessage(),
            ], 422);
        }

        return response()->json([
            'message' => __('price.messages.created'),
            'data' => [
                'id' => $price->id,
                'price' => $price->price,
            ],
        ], 201);
    }
}