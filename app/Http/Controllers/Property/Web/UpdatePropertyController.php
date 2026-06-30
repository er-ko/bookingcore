<?php

namespace App\Http\Controllers\Property\Web;

use App\Application\Property\Actions\UpdateProperty;
use App\Http\Controllers\Controller;
use App\Http\Requests\Property\UpdatePropertyRequest;
use App\Models\Property\Property;
use Illuminate\Http\RedirectResponse;
use RuntimeException;

final class UpdatePropertyController extends Controller
{
    /**
     * Update the given property.
     */
    public function __invoke(
        UpdatePropertyRequest $request,
        Property $property,
        UpdateProperty $updateProperty,
    ): RedirectResponse {
        try {
            $updateProperty(
                $this->user(),
                $property->public_id,
                $request->toDTO(),
            );
        } catch (RuntimeException $exception) {
            return redirect()
                ->route('properties.index')
                ->with('error', $exception->getMessage() ?: __('property.messages.failed'));
        }

        return redirect()
            ->route('properties.index')
            ->with('success', __('property.messages.updated'));
    }
}
