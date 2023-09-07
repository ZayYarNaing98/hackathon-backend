<?php

namespace App\Http\Controllers\API;

use Exception;
use Throwable;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    protected $service;

    public function __construct(AuthService $service)
    {
        $this->service = $service;
        // $this->middleware('auth');
    }

    // public function login(Request $request)
    // {
    //     try {

    //         $startTime = microtime(true);

    //         $data = $this->service->login($request);
    //     } catch (Exception $e) {
    //         Log::channel('hackathon_daily_error')->error('Login Error' . $e->getMessage());
    //         return response()->error(request(), null, $e->getMessage(), 500,   $startTime);
    //     };
    // }

    // public function login(Request $request)
    // {
    //     // $user = Auth::user();
    //     // dd($user);
    //     try {
    //         $validateUser = Validator::make($request->all(),
    //         [
    //             'email' => 'required|email',
    //             'password' => 'required'
    //         ]);

    //         if($validateUser->fails()){
    //             return response()->json([
    //                 'status' => false,
    //                 'message' => 'validation error',
    //                 'errors' => $validateUser->errors()
    //             ], 401);
    //         }

    //         if(!Auth::attempt($request->only(['email', 'password']))){
    //             return response()->json([
    //                 'status' => false,
    //                 'message' => 'Email & Password does not match with our record.',
    //             ], 401);
    //         }

    //         $user = User::where('email', $request->email)->first();

    //         return response()->json([
    //             'status' => true,
    //             'message' => 'User Logged In Successfully',
    //             'token' => $user->createToken("API TOKEN")->plainTextToken,
    //             // 'role'=>$user->getRoleNames()->first(),
    //             // 'user'=>$user,
    //         ], 200);

    //     } catch (Throwable $th) {
    //         return response()->json([
    //             'status' => false,
    //             'message' => $th->getMessage()
    //         ], 500);
    //     }
    // }


    public function register(UserRequest $request)
    {
        try {

            $startTime = microtime(true);

            $validatedData = $request->validated();

            $data = $this->service->register($validatedData);

            return response()->success($request, $data, 'User Created Successfully.', 201, $startTime, 1);
        } catch (Exception $e) {
            Log::channel('hackathon_daily_error')->error('Error Create User' . $e->getMessage());

            return response()->error($request, null, $e->getMessage(), 500, $startTime);
        }
    }

}
