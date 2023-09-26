<?php

namespace App\Http\Controllers\API;

use Exception;
use Illuminate\Http\Request;
use App\Services\PaymentService;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;

class PaymentController extends Controller
{
    protected $service;

    public function __construct(PaymentService $service)
    {
        $this->service = $service;
    }

    public function store(PaymentRequest $request)
    {

        // dd($request);
        try {

            $startTime = microtime(true);

            $validatedData = $request->validated();

            $data = $this->service->payment($validatedData);

            return response()->success($request, $data, 'Payment Created Successfully.', 201, $startTime, 1);
        } catch (Exception $e) {
            Log::channel('hackathon_daily_error')->error('Error Payment Create' . $e->getMessage());

            return response()->error($request, null, $e->getMessage(), 500, $startTime);
        }
    }

}
