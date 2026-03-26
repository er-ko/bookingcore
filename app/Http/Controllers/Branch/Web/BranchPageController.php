<?php

namespace App\Http\Controllers\Branch\Web;

use App\Application\Branch\Queries\BranchFormOptionsQuery;
use App\Application\Branch\Queries\BranchPageQuery;
use App\Support\Translations\BranchTranslations;
use App\Http\Controllers\Controller;
use App\Http\Resources\Branch\BranchResource;
use App\Models\Branch;
use Inertia\Inertia;
use Inertia\Response;

final class BranchPageController extends Controller
{
    /**
     * Display a listing of branches.
     */
    public function index(BranchPageQuery $branchPageQuery): Response
    {
        $branches = $branchPageQuery->getList($this->user());

        return Inertia::render('Branch/Index', [
            'branches' => BranchResource::collection($branches),
            'translations' => BranchTranslations::index(),
        ]);
    }

    /**
     * Show the branch creation page.
     */
    public function create(BranchFormOptionsQuery $branchFormOptionsQuery): Response
    {
        return Inertia::render('Branch/Create', [
            'translations' => BranchTranslations::create(),
            ...$branchFormOptionsQuery->getCreateFormData(),
        ]);
    }

    /**
     * Show the branch edit page.
     */
    public function edit(
        Branch $branch,
        BranchFormOptionsQuery $branchFormOptionsQuery
    ): Response {
        abort_unless($branch->user_id === $this->user()->id, 404);

        $branch->load('country');

        return Inertia::render('Branch/Edit', [
            'branch' => BranchResource::make($branch)->resolve(),
            'translations' => BranchTranslations::edit(),
            ...$branchFormOptionsQuery->getCreateFormData(),
        ]);
    }
}