<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\UserRepositoryInterface;

class UserService
{
    protected $userInterface;

    public function __construct(UserRepositoryInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    public function getUsers(Request $request)
    {
        return $this->userInterface->getUsers($request);
    }

    public function getUserById($id)
    {
        return $this->userInterface->getUserById($id);
    }

    public function storeUser($data)
    {
        $user = User::create($data);

        if (isset($data['role'])) {
            $user->assignRole($data['role']);
        }

        return $user;
    }

    public function updateUserById($data, int $id)
    {
        $startTime = microtime(true);

        $user = User::find($id);

        if (!$user) {
            return response()->error(request(), null, 'User not found', 404, $startTime);
        }

        if (isset($data['role'])) {
            $user->syncRoles($data['role']);
        }

        $user->update($data);

        return response()->success(request(), $user, 'User Updated Successfully.', 200, $startTime, 1);
    }

    public function deleteUserById(int $id)
    {
        $startTime = microtime(true);

        $user = User::find($id);

        if (!$user) {
            return response()->error(request(), null, 'User not found', 404, $startTime);
        }

        $user->delete();

        return response()->success(request(), $user, 'User Deleted Successfully.', 200, $startTime, 1);
    }

    public function getRoleName()
    {
        return $this->userInterface->getRoleName();
    }

    public function status(Request $request, $id)
    {
        $startTime = microtime(true);

        $user = User::where('id', $id)->first();

        if (!$user) {
            return response()->error(request(), null, 'User not found', 404);
        }

        $user->status = $request['status'];

        $data = $user->save();

        return response()->success($request, $data, 'User Status Change Successfully', 200, $startTime, 1);
    }
}
