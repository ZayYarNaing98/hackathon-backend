<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Services\PostAttachmentService;
use App\Http\Requests\PostAttachmentRequest;



class PostAttachmentController extends Controller
{

    protected $service;

    public function __construct(PostAttachmentService $service)
    {
        $this->service = $service;
    }

    public function getAttachmentByPostId($id)
    {
        $startTime = microtime(true);

        try {
            $data = $this->service->getAttachmentByPostId($id);

            return $data;
        } catch (Exception $e) {

            Log::channel('hackathon_daily_error')->error('Error Image Retrieve' . $e->getMessage());

            return response()->error(request(), null, $e->getMessage(), 400, $startTime);
        }
    }

    public function storePostAttachment(PostAttachmentRequest $request, $id)
    {
        try {
            $startTime = microtime(true);

            $data = $this->service->storePostAttachment($request, $id);

            return response()->success($request, $data, 'Post Attachment Created Successfully.', 201, $startTime, count($data));
        } catch (Exception $e) {
            Log::channel('hackathon_daily_error')->error('Error Attachment Store' . $e->getMessage());

            return response()->error(request(), null, $e->getMessage(), 500,   $startTime);
        }
    }

    public function deletePostAttachmentById($id)
    {
        try {
            $startTime = microtime(true);

            $data = $this->service->deletePostAttachmentById($id);

            return $data;
        } catch (Exception $e) {
            Log::channel('hackathon_daily_error')->error('Error Attachment Delete' . $e->getMessage());

            return response()->error(request(), null, $e->getMessage(), 500, $startTime);
        }
    }

}
