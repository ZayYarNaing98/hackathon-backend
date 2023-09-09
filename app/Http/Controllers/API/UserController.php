<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        try {

            $startTime = microtime(true);

            $data = $this->service->getUsers();

            return response()->success($request, $data, 'User Retrieved Successfully.', 200, $startTime, count($data));
        } catch (Exception $e) {
            Log::channel('hackathon_daily_error')->error('Error User Retrieved' . $e->getMessage());

            return response()->error(request(), null, $e->getMessage(), 500,   $startTime);
        };
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        try {

            $startTime = microtime(true);

            $validatedData = $request->validated();

            $data = $this->service->storeUser($validatedData);

            return response()->success($request, $data, 'User Created Successfully.', 201, $startTime, 1);
        } catch (Exception $e) {
            Log::channel('hackathon_daily_error')->error('Error Create User' . $e->getMessage());

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

            $data = $this->service->getUserById($id);

            return $data;
        } catch (Exception $e) {
            Log::channel('hackathon_daily_error')->error('Error User Retrieved' . $e->getMessage());

            return response()->error(request(), null, $e->getMessage(), 500, $startTime);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, string $id)
    {
        try {
            $startTime = microtime(true);

            $validatedData = $request->validated();

            $data = $this->service->updateUserById($validatedData, $id);

            return $data;
        } catch (Exception $e) {
            Log::channel('hackathon_daily_error')->error('Error User Update' . $e->getMessage());

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

            $data = $this->service->deleteUserById($id);

            return $data;
        } catch (Exception $e) {
            Log::channel('hackathon_daily_error')->error('Error User Delete' . $e->getMessage());

            return response()->error(request(), null, $e->getMessage(), 500, $startTime);
        }
    }
}
