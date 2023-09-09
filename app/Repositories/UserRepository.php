<?php

namespace App\Repositories;

use App\Models\User;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Collection;

class UserRepository implements UserRepositoryInterface
{
    public function getUsers():Collection
    {
        $data = User::with('roles')->get();

        return $data;
    }

    public function getUserById($id)
    {
        $startTime = microtime(true);

        $data = User::where('id', $id)->first();

        if ($data) {
            return response()->success(request(), $data, 'User Found Successfully', 200, $startTime, 1);
        }else {
            return response()->error(request(), null, "User not found", 404, $startTime);
        }
    }

}
