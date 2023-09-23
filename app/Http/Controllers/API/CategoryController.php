<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Services\CategoryService;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryListResource;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $service;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }
    public function index()
    {
        try {
            $startTime = microtime(true);

            $data = $this->service->getCategory();

            $result = CategoryListResource::collection($data);

            return response()->success(request(), $result, 'Category Retrieve Sucessfully.', 200, $startTime, count($data));
        } catch (Exception $e) {

            Log::channel('hackathon_daily_error')->error('Error Category Retrieved' . $e->getMessage());

            return response()->error(request(), null, $e->getMessage(), 500, $startTime);
        };
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        try {
            $startTime = microtime(true);

            $validatedData = $request->validated();

            $data = $this->service->storeCategory($validatedData);

            return response()->success($request, $data, 'Category Created Sucessfully.', 201, $startTime, 1);
        } catch (Exception $e) {
            Log::channel('hackthon_daily_error')->error('Error Create Category' . $e->getMessage());

            return response()->error($request, null, $e->getMessage(), 500, $startTime);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $startTime = microtime(true);

            $data = $this->service->getCategoryById($id);

            return $data;
        } catch (Exception $e) {
            Log::channel('hackthon_daily_error')->error('Error Category Retrieved' . $e->getMessage());

            return response()->error(request(), null, $e->getMessage(), 500, $startTime);
        }
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        try {
            $startTime = microtime(true);

            $validatedData = $request->validated();

            $data = $this->service->updateCategoryById($validatedData, $id);

            return $data;
        } catch (Exception $e) {
            Log::channel('hackathon_daily_error')->error('Error Category Update' . $e->getMessage());

            return response()->error($request, null, $e->getMessage(), 500, $startTime);
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $startTime = microtime(true);

            $data = $this->service->deleteCategoryById($id);

            return $data;
        } catch (Exception $e) {
            Log::channel('hackathon_daily_error')->error('Error Category Delete' . $e->getMessage());

            return response()->error(request(), null, $e->getMessage(), 500, $startTime);
        }
    }
}
