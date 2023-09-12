<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    protected function limit(Request $request)
    {
        $limit = (int) $request->input('limit', Config::get('paginate.default_limit'));

        return $limit;
    }

    public function getUsers(Request $request)
    {
        $data = User::with('roles')->paginate($this->limit($request));

        return $data;
    }

    public function getUserById($id)
    {
        $startTime = microtime(true);

        $data = User::where('id', $id)->first();

        if ($data) {
            return response()->success(request(), $data, 'User Found Successfully', 200, $startTime, 1);
        } else {
            return response()->error(request(), null, "User not found", 404, $startTime);
        }
    }
}
