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

        if (!Auth::attempt($request->only(['email', 'password']))) {
            return response()->error($request, null, 'Email & Password does not match with our record.', 401, $startTime);
        }

        $user = User::where('email', $request->email)->first();

        $user['token'] = $user->createToken("API TOKEN")->plainTextToken;

        $user->load('roles');

        return $user;
    }
}
