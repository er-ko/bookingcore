<?php

namespace App\Http\Controllers\Property\Web;

use App\Application\Property\Queries\PropertyFormOptionsQuery;
use App\Application\Property\Queries\PropertyPageQuery;
use App\Http\Controllers\Controller;
use App\Http\Resources\Property\PropertyResource;
use App\Models\Property\Property;
use App\Support\Translations\PropertyTranslations;
use Inertia\Inertia;
use Inertia\Response;

final class PropertyPageController extends Controller
{
    /**
     * Display a listing of properties.
     */
    public function index(PropertyPageQuery $query): Response
    {
        $properties = $query->getList($this->user());

        return Inertia::render('Property/Index', [
            'properties'   => PropertyResource::collection($properties),
            'translations' => PropertyTranslations::index(),
        ]);
    }

    /**
     * Show the property creation page.
     */
    public function create(PropertyFormOptionsQuery $formOptionsQuery): Response
    {
        return Inertia::render('Property/Create', [
            'translations' => PropertyTranslations::create(),
            ...$formOptionsQuery->getCreateFormData(),
        ]);
    }

    /**
     * Show the property edit page.
     */
    public function edit(Property $property, PropertyFormOptionsQuery $formOptionsQuery): Response
    {
        abort_unless($property->user_id === $this->user()->id, 404);

        $property->load('country');

        return Inertia::render('Property/Edit', [
            'property'     => PropertyResource::make($property)->resolve(),
            'translations' => PropertyTranslations::edit(),
            ...$formOptionsQuery->getCreateFormData(),
        ]);
    }
}
