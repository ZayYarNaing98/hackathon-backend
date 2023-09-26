<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Interfaces\UserRepositoryInterface;
use Spatie\Permission\Models\Role;

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
        $role = $request->input('role');

        $data = User::with('roles');

        $data->when(isset($search), function ($query) use ($search) {
            $like = '%' . $search . '%';
            $query->where('name', 'like', $like);
        });

        $data->when(isset($status) && in_array($status, [0, 1]), function ($query) use ($status) {
            $query->where('status', $status);
        });



        $data->when(isset($role), function ($query) use ($role) {
            $query->whereHas('roles', function ($query) use ($role) {
                $query->where('name', 'like', '%' . $role . '%');
            });
        });

        return $data->paginate($this->limit($request));
    }

    public function getUserById($id)
    {
        $data = User::where('id', $id)->with('roles')->get();

        return $data;
    }

    public function getRoleName()
    {
        $data = Role::get();

        return $data;
    }
}
