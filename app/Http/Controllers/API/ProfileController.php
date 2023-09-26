<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Http\Request;
use App\Services\ProfileService;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Http\Resources\ProfileListResource;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     protected $service;

     public function __construct(ProfileService $service)
     {
         $this->service = $service;
     }

    public function index(Request $request)
    {
        try {

            $startTime = microtime(true);

            $data = $this->service->getProfile();

            $result = ProfileListResource::collection($data);

            return response()->success($request, $result, 'Profile Retrieved Successfully.', 200, $startTime, count($data));
        } catch (Exception $e) {
            Log::channel('hackathon_daily_error')->error('Error Profile Retrieved' . $e->getMessage());

            return response()->error(request(), null, $e->getMessage(), 500,   $startTime);
        };
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProfileRequest $request)
    {
        try {

            $startTime = microtime(true);

            $validatedData = $request->validated();

            $data = $this->service->storeProfile($validatedData);

            return response()->success($request, $data, 'Profile Created Successfully.', 201, $startTime, 1);
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error Created Profile' . $e->getMessage());

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

            $data = $this->service->getProfileById($id);

            return $data;
        } catch (Exception $e) {
            Log::channel('hackathon_daily_error')->error('Error Profile Retrieved' . $e->getMessage());

            return response()->error(request(), null, $e->getMessage(), 500, $startTime);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileRequest $request, string $id)
    {
        try {
            $startTime = microtime(true);

            $validatedData = $request->validated();

            $data = $this->service->updateProfileById($validatedData, $id);

            return $data;
        } catch (Exception $e) {
            Log::channel('hackathon_daily_error')->error('Error Update Profile' . $e->getMessage());

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

            $data = $this->service->deleteProfileById($id);

            return $data;
        } catch (Exception $e) {
            Log::channel('hackathon_daily_error')->error('Error Delete Profile' . $e->getMessage());

            return response()->error(request(), null, $e->getMessage(), 500, $startTime);
        }
    }

    public function storeImageByProfileId(Request $request, $id)
    {
        $startTime = microtime(true);

        try {
            $data = $this->service->storeImageByProfileId($request, $id);

            return $data;
        } catch (Exception $e) {
            Log::channel('hackathon_daily_error')->error('Error Image Uploaded' . $e->getMessage());

            return response()->error(request(), null, $e->getMessage(), 500, $startTime);
        }
    }

    public function getImageByProfileId($id)
    {
        $startTime = microtime(true);

        try {
            $data = $this->service->getImageByProfileId($id);

            return $data;
        } catch (Exception $e) {

            Log::channel('hackathon_daily_error')->error('Error Image Retrieve' . $e->getMessage());

            return response()->error(request(), null, $e->getMessage(), 400, $startTime);
        }
    }

    public function deleteImageByProfileId($id)
    {
        $startTime = microtime(true);

        try {
            $data = $this->service->deleteImageByProfileId($id);

            return $data;
        } catch (Exception $e) {

            Log::channel('hackathon_daily_error')->error('Error Image Delete' . $e->getMessage());

            return response()->error(request(), null, $e->getMessage(), 400, $startTime);
        }
    }
}
