<?php

namespace App\Http\Controllers;

use App\Http\Services\CarModelService;
use App\Models\CarModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCarModelRequest;
use App\Http\Requests\UpdateCarModelRequest;
use Inertia\Inertia;
use Inertia\Response;

class CarModelController extends Controller
{

    public function __construct(CarModelService $carModelService)
    {
        $this->carModelService = $carModelService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        return Inertia::render('CarModel/Index', ['carModels' => $this->carModelService->index($request)]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return Inertia::render('CarModel/Create', [
            'brands' => $this->carModelService->getBrands(),
        ]);
    }


    /**
     *  Store a newly created resource in storage.
     *
     * @param StoreCarModelRequest $request
     * @return RedirectResponse
     */
    public function store(StoreCarModelRequest $request): RedirectResponse
    {
        $this->carModelService->store($request);
        return to_route('car-models.index')->with('success', 'Car model created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(CarModel $carModel)
    {
        return Inertia::render('CarModel/Show', [
            'carModel' => $this->carModelService->show($carModel),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CarModel $carModel) : Response
    {
        return Inertia::render('CarModel/Edit',
        ["carModel" => $this->carModelService->edit($carModel),
            'brands' => $this->carModelService->getBrands(),]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarModelRequest $request, CarModel $carModel)
    {
        $this->carModelService->update($request, $carModel);
        return to_route('car-models.index')->with('success', 'Car model updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarModel $carModel)
    {
        $this->carModelService->destroy($carModel);
        return to_route('car-models.index')->with('success', 'Car model deleted successfully');
    }
}
