<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Http\Request;
use App\Services\PostService;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostListResource;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $service;

    public function __construct(PostService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        try {

            $startTime = microtime(true);

            $data = $this->service->getPost();

            $result = PostListResource::collection($data);

            return response()->success($request, $result, 'Post Retrieved Successfully.', 200, $startTime, count($data));
        } catch (Exception $e) {
            Log::channel('hackathon_daily_error')->error('Error Post Retrieved' . $e->getMessage());

            return response()->error(request(), null, $e->getMessage(), 500,   $startTime);
        };
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        try {

            $startTime = microtime(true);

            $validatedData = $request->validated();

            $data = $this->service->storePost($validatedData);

            return response()->success($request, $data, 'Post Created Successfully.', 201, $startTime, 1);
        } catch (Exception $e) {
            Log::channel('web_daily_error')->error('Error Created Post' . $e->getMessage());

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

            $data = $this->service->getPostById($id);

            return $data;
        } catch (Exception $e) {
            Log::channel('hackathon_daily_error')->error('Error Post Retrieved' . $e->getMessage());

            return response()->error(request(), null, $e->getMessage(), 500, $startTime);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, string $id)
    {
        try {
            $startTime = microtime(true);

            $validatedData = $request->validated();

            $data = $this->service->updatePostById($validatedData, $id);

            return $data;
        } catch (Exception $e) {
            Log::channel('hackathon_daily_error')->error('Error Update Post' . $e->getMessage());

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

            $data = $this->service->deletePostById($id);

            return $data;
        } catch (Exception $e) {
            Log::channel('hackathon_daily_error')->error('Error Delete Post' . $e->getMessage());

            return response()->error(request(), null, $e->getMessage(), 500, $startTime);
        }
    }
}
