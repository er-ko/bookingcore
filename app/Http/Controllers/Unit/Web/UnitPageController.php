<?php

namespace App\Http\Controllers\Unit\Web;

use App\Application\Unit\Queries\UnitFormOptionsQuery;
use App\Application\Unit\Queries\UnitPageQuery;
use App\Support\Translations\UnitTranslations;
use App\Http\Controllers\Controller;
use App\Http\Resources\Unit\UnitResource;
use App\Models\Unit;
use Inertia\Inertia;
use Inertia\Response;

final class UnitPageController extends Controller
{
    /**
     * Display a listing of units.
     */
    public function index(UnitPageQuery $unitPageQuery): Response
    {
        $units = $unitPageQuery->getList($this->user());

        return Inertia::render('Unit/Index', [
            'units' => UnitResource::collection($units),
            'translations' => UnitTranslations::index(),
        ]);
    }

    /**
     * Show the unit creation page.
     */
    public function create(UnitFormOptionsQuery $unitFormOptionsQuery): Response
    {
        return Inertia::render('Unit/Create', [
            'translations' => UnitTranslations::create(),
            ...$unitFormOptionsQuery->getCreateFormData(),
        ]);
    }

    /**
     * Show the unit edit page.
     */
    public function edit(
        Unit $unit,
        UnitFormOptionsQuery $unitFormOptionsQuery
    ): Response {
        abort_unless($unit->user_id === $this->user()->id, 404);

        $unit->load('branch');

        return Inertia::render('Unit/Edit', [
            'unit' => UnitResource::make($unit)->resolve(),
            'translations' => UnitTranslations::edit(),
            ...$unitFormOptionsQuery->getCreateFormData(),
        ]);
    }
}