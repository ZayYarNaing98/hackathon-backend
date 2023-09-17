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
        $search = $request->input('search');
        $status = $request->input('status');

        $data = User::with('roles');

        $data->when(isset($search), function ($query) use ($search) {
            $like = '%' . $search . '%';
            $query->where('name', 'like', $like);
        });

        // if (isset($status) && in_array($status, [0, 1])) {
        //     $data->where('status', $status);
        // }

        $data->when(isset($status) && in_array($status, [0, 1]), function ($query) use ($status) {
            $query->where('status', $status);
        });

        if (isset($role)) {
            $data->whereHas('roles', function ($query) use ($role) {
                $query->where('name', $role);
            });
        }

        // $data->when(isset($status), function ($query) use ($status) {
        //     $like = '%' . $status . '%';
        //     $query->where('name', 'like', $like);
        // });

        return $data->paginate($this->limit($request));
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
