<?php

namespace App\Application\Property\Actions;

use App\Models\Property\Property;
use App\Models\User;
use RuntimeException;

final class DeleteProperty
{
    /**
     * Delete an existing property for the given user.
     */
    public function __invoke(User $user, string $propertyPublicId): void
    {
        $property = Property::query()
            ->where('public_id', $propertyPublicId)
            ->where('user_id', $user->id)
            ->first();

        if (! $property) {
            throw new RuntimeException(__('property.messages.not_found'));
        }

        $property->delete();
    }
}
