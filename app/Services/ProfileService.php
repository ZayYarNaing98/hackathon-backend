<?php

namespace App\Services;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Interfaces\ProfileRepositoryInterface;

class ProfileService
{
    protected $profileInterface;

    public function __construct(ProfileRepositoryInterface $profileInterface)
    {
        $this->profileInterface = $profileInterface;
    }

    public function getProfile()
    {
        return $this->profileInterface->getProfile();
    }

    public function getProfileById($id)
    {
        return $this->profileInterface->getProfileById($id);
    }

    public function storeProfile($data)
    {
        $profile = Profile::create($data);

        return $profile;
    }

    public function updateProfileById($data, $id)
    {
        $startTime = microtime(true);

        $profile = Profile::where('id', $id)->first();

        if (!$profile) {
            return response()->error(request(), null, 'Profile not found', 404, $startTime);
        }

        $profile->update($data);

        return response()->success(request(), $profile, 'Profile Updated Successfully.', 200, $startTime, 1);
    }

    public function deleteProfileById($id)
    {
        $startTime = microtime(true);

        $profile = Profile::where('id', $id)->first();

        if (!$profile) {
            return response()->error(request(), null, 'Profile not found', 404, $startTime);
        }
        $profile->delete();

        return response()->success(request(), $profile, 'Profile Deleted Successfully.', 200, $startTime, 1);
    }

    public function storeImageByProfileId(Request $request, $id)
    {
        $startTime = microtime(true);

        $profile = Profile::where('id', $id)->first();

        if (!$profile) {
            return response()->error(request(), null, 'User not found', 404);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . "_" . $image->getClientOriginalName();
            $image->storeAs('banners/' . $imageName);

            $profile->image = $imageName;

            $profile->save();

            return response()->success($request, $imageName, "Image Uploaded Successfully", 200, $startTime, 1);
        } else {
            return response()->error(request(), null, 'No image provided', 400);
        }
    }

    public function getImageByProfileId($id)
    {
        $startTime = microtime(true);

        $profile = Profile::find($id);

        if (!$profile) {
            return response()->error(request(), null, 'Profile not found', 404, $startTime);
        }

        if (!$profile->image) {
            return response()->error(request(), null, 'Profile does not have an Banner', 400, $startTime);
        }

        $imageUrl = asset('banners/' . $profile->image);

        return response()->success(request(), $imageUrl, 'Profile Image Found Successfully', 200, $startTime, 1);
    }

    public function deleteImageByProfileId($id)
    {
        $startTime = microtime(true);

        $profile = Profile::find($id);

        if (!$profile) {
            return response()->error(request(), null, 'Profile not found', 404, $startTime);
        }

        if (!$profile->image) {
            return response()->error(request(), null, 'Profile does not have an image', 400, $startTime);
        }

        Storage::delete('banners/' . $profile->image);

        $profile->image = null;
        $profile->save();

        return response()->success(request(), null, 'Profile Image Delete Successfully', 200, $startTime, 1);
    }
}
