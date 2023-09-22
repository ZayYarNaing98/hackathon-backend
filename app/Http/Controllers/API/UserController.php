<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\GetUserByIdResource;
use App\Http\Resources\GetUserListResource;
use App\Http\Resources\RoleResource;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
        // $this->middleware('permission:userList', ['only' => 'index']);
        // $this->middleware('permission:userCreate', ['only' => 'store']);
        // $this->middleware('permission:userShow', ['only' => 'show']);
        // $this->middleware('permission:userUpdate', ['only' => 'update']);
        // $this->middleware('permission:userDelete', ['only' => 'destroy']);
    }

    public function index(Request $request)
    {
        try {

            $startTime = microtime(true);

            $data = $this->service->getUsers($request);

            $result = GetUserListResource::collection($data);

            return response()->paginate($request, $result, 'User Retrieved Successfully.', 200, $startTime);
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

            $result = GetUserByIdResource::collection($data);

            if ($result) {
                return response()->success(request(), $result, 'User Found Successfully', 200, $startTime, 1);
            } else {
                return response()->error(request(), null, "User not found", 404, $startTime);
            }
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

    public function getRoleName()
    {
        try {
            $startTime = microtime(true);

            $data = $this->service->getRoleName();

            $result = RoleResource::collection($data);

            return response()->success(request(), $result, 'Role Retrieve Successfully.', 200, $startTime, count($data));
        } catch (Exception $e) {
            Log::channel('hackathon_daily_error')->error('Error Retrieve Role' . $e->getMessage());
        }
    }

    public function status(Request $request, $id)
    {
        try {
            $data = $this->service->status($request, $id);

            return $data;
        } catch (Exception $e) {
            Log::channel('hackathon_daily_error')->error('Error Status Change' . $e->getMessage());
        }
    }
}
