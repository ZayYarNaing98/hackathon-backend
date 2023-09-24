<?php

namespace App\Repositories;

use App\Models\Profile;
use App\Interfaces\ProfileRepositoryInterface;

class ProfileRepository implements ProfileRepositoryInterface
{
    public function getProfile()
    {
        $profile = Profile::get();

        return $profile;
    }

    public function getProfileById($id)
    {
        $startTime = microtime(true);

        $profile = Profile::where('user_id', $id)->get();

        if ($profile) {
            return response()->success(request(), $profile, 'Profile Found Successfully', 200, $startTime, 1);
        } else {
            return response()->error(request(), null, "Profile not found", 404, $startTime);
        }
    }
}
