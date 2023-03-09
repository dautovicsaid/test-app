<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Http\Services\BrandService;
use App\Models\Brand;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class BrandController extends Controller
{

    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        return Inertia::render('Brand/Index', [
                'brands' => $this->brandService->index($request)
            ]
        );
    }

    /**
     * @return Response
     */
    public function create(): Response
    {
        return Inertia::render('Brand/Create');
    }

    /**
     * @param StoreBrandRequest $request
     * @return RedirectResponse
     */
    public function store(StoreBrandRequest $request): RedirectResponse
    {
        $this->brandService->store($request);
        return to_route('brands.index')->with('success', 'Brand created successfully');
    }

    public function show(Brand $brand) : Response
    {
        return Inertia::render('Brand/Show', [
            'brand' => $this->brandService->show($brand),
        ]);
    }

    public function edit(Brand $brand): Response
    {
        return Inertia::render('Brand/Edit', [
            'brand' => $this->brandService->edit($brand),
        ]);
    }

    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $this->brandService->update($request, $brand);
        return to_route('brands.index')->with('success', 'Brand updated successfully');
    }

    public function destroy(Brand $brand)
    {
        $this->brandService->destroy($brand);
        return to_route('brands.index')->with('success', 'Brand deleted successfully');

    }
}
