<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Services\ProductCategoryService;
use App\Models\ProductCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ProductCategoryController extends Controller
{
    public function __construct(ProductCategoryService $productCategoryService)
    {
        $this->productCategoryService = $productCategoryService;
    }


    /**
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) : Response
    {
        return Inertia::render('ProductCategory/Index', [
            'productCategories' => $this->productCategoryService->index($request),
        ]);
    }

    /**
     * @return Response
     */
    public function create() : Response
    {
        return Inertia::render('ProductCategory/Create');
    }

    public function store(StoreProductCategoryRequest $request) : RedirectResponse
    {
        $this->productCategoryService->store($request);

        return to_route('product-categories.index')->with('success', 'Product category created successfully');
    }

    public function show(ProductCategory $productCategory) : Response
    {
        return Inertia::render('ProductCategory/Show', [
            'productCategory' => $this->productCategoryService->show($productCategory),
        ]);
    }

    public function edit(ProductCategory $productCategory) : Response
    {
        return Inertia::render('ProductCategory/Edit', [
            'productCategory' => $this->productCategoryService->edit($productCategory),
        ]);
    }

    public function update(StoreProductCategoryRequest $request, ProductCategory $productCategory) : RedirectResponse
    {
        $this->productCategoryService->update($request, $productCategory);
        return to_route('product-categories.index')->with('success', 'Product category updated successfully');
    }


    public function destroy(ProductCategory $productCategory) : RedirectResponse
    {
        $this->productCategoryService->destroy($productCategory);
        return to_route('product-categories.index')->with('success', 'Product category deleted successfully');
    }
}
