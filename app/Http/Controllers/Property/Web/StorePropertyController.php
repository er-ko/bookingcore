<?php

namespace App\Http\Controllers\Property\Web;

use App\Application\Property\Actions\StoreProperty;
use App\Http\Controllers\Controller;
use App\Http\Requests\Property\StorePropertyRequest;
use Illuminate\Http\RedirectResponse;
use RuntimeException;

final class StorePropertyController extends Controller
{
    /**
     * Create a new property.
     */
    public function __invoke(StorePropertyRequest $request, StoreProperty $storeProperty): RedirectResponse
    {
        try {
            $storeProperty(
                $this->user(),
                $request->toDTO(),
            );
        } catch (RuntimeException $exception) {
            return redirect()
                ->route('properties.index')
                ->with('error', $exception->getMessage() ?: __('property.messages.failed'));
        }

        return redirect()
            ->route('properties.index')
            ->with('success', __('property.messages.created'));
    }
}
