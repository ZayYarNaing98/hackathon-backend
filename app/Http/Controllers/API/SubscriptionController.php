<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Services\SubscriptionService;
use App\Http\Requests\SubscriptionRequest;
use App\Http\Resources\SubscriptionByIdResource;
use App\Http\Resources\SubscriptionListResource;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $service;

    public function __construct(SubscriptionService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        try {

            $startTime = microtime(true);

            $data = $this->service->getSubscription();

            $result = SubscriptionListResource::collection($data);

            return response()->success($request, $result, 'Subscription Retrieved Successfully.', 200, $startTime, count($data));
        } catch (Exception $e) {
            Log::channel('hackathon_daily_error')->error('Error Subscription Retrieved' . $e->getMessage());

            return response()->error(request(), null, $e->getMessage(), 500,   $startTime);
        };
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubscriptionRequest $request)
    {
        try {

            $startTime = microtime(true);

            $validatedData = $request->validated();

            $data = $this->service->storeSubscription($validatedData);

            return response()->success($request, $data, 'Subscription Created Successfully.', 201, $startTime, 1);
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error Created Subscription' . $e->getMessage());

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

            $data = $this->service->getSubscriptionById($id);

            $result = SubscriptionByIdResource::collection($data);

            return response()->success(request(), $result, 'Subscription Found Successfully', 200, $startTime, 1);

            // return $data;
        } catch (Exception $e) {
            Log::channel('hackathon_daily_error')->error('Error Subscription Retrieved' . $e->getMessage());

            return response()->error(request(), null, $e->getMessage(), 500, $startTime);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubscriptionRequest $request, string $id)
    {
        try {
            $startTime = microtime(true);

            $validatedData = $request->validated();

            $data = $this->service->updateSubscriptionById($validatedData, $id);

            return $data;
        } catch (Exception $e) {
            Log::channel('hackathon_daily_error')->error('Error Update Feature' . $e->getMessage());

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

            $data = $this->service->deleteSubscriptionById($id);

            return $data;
        } catch (Exception $e) {
            Log::channel('hackathon_daily_error')->error('Error Delete Subscription' . $e->getMessage());

            return response()->error(request(), null, $e->getMessage(), 500, $startTime);
        }
    }
}
