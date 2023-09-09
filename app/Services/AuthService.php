<?php

namespace App\Services;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function login(Request $request)
    {
        $startTime = microtime(true);

        try {

            if (!Auth::attempt($request->only(['email', 'password']))) {
                return response()->error($request, null, 'Email & Password does not match with our record.', 401, $startTime);
            }

            $user = User::where('email', $request->email)->first();

            $user['token'] = $user->createToken("API TOKEN")->plainTextToken;

            $user['roles'] = $user->getRoleNames()->first();

            return response()->success($request, $user, 'User Logged In Successfully.', 200, microtime(true), 1);
        } catch (Exception $e) {
            Log::channel('hackathon_daily_error')->error('Login Error' . $e->getMessage());

            return response()->error($request, null, $e->getMessage(), 500, $startTime);
        }
    }
}
