<?php

namespace App\Repositories;

use App\Interfaces\FeatureRepositoryInterface;
use App\Models\Feature;

class FeatureRepository implements FeatureRepositoryInterface
{
    public function getFeature()
    {
        $feature = Feature::with('subscription')->get();

        return $feature;
    }

    public function getFeatureById($id)
    {
        $startTime = microtime(true);

        $feature = Feature::where('id', $id)->with('subscription')->get();

        if ($feature) {
            return response()->success(request(), $feature, 'Feature Found Successfully', 200, $startTime, 1);
        } else {
            return response()->error(request(), null, "Feature not found", 404, $startTime);
        }
    }
}
