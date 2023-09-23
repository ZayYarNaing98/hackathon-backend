<?php

namespace App\Services;

use App\Interfaces\FeatureRepositoryInterface;
use App\Models\Feature;

class FeatureService
{
    protected $featureInterface;

    public function __construct(FeatureRepositoryInterface $featureInterface)
    {
        $this->featureInterface = $featureInterface;
    }

    public function getFeature()
    {
        return $this->featureInterface->getFeature();
    }

    public function getFeatureById($id)
    {
        return $this->featureInterface->getFeatureById($id);
    }

    public function storeFeature($data)
    {
        $feature = Feature::create($data);

        return $feature;
    }

    public function updateFeatureById($data, $id)
    {
        $startTime = microtime(true);

        $feature = Feature::where('id', $id)->first();

        if (!$feature) {
            return response()->error(request(), null, 'Feature not found', 404, $startTime);
        }

        $feature->update($data);

        return response()->success(request(), $feature, 'Feature Updated Successfully.', 200, $startTime, 1);
    }

    public function deleteFeatureById($id)
    {
        $startTime = microtime(true);

        $feature = Feature::where('id', $id)->first();

        if (!$feature) {
            return response()->error(request(), null, 'Feature not found', 404, $startTime);
        }
        $feature->delete();

        return response()->success(request(), $feature, 'Feature Deleted Successfully.', 200, $startTime, 1);
    }
}
