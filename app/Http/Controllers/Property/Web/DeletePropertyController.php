<?php

namespace App\Http\Controllers\Property\Web;

use App\Application\Property\Actions\DeleteProperty;
use App\Http\Controllers\Controller;
use App\Models\Property\Property;
use Illuminate\Http\RedirectResponse;
use RuntimeException;

final class DeletePropertyController extends Controller
{
    /**
     * Delete the given property.
     */
    public function __invoke(Property $property, DeleteProperty $deleteProperty): RedirectResponse
    {
        try {
            $deleteProperty(
                $this->user(),
                $property->public_id,
            );
        } catch (RuntimeException $exception) {
            return redirect()
                ->route('properties.index')
                ->with('error', $exception->getMessage() ?: __('property.messages.failed'));
        }

        return redirect()
            ->route('properties.index')
            ->with('success', __('property.messages.deleted'));
    }
}
