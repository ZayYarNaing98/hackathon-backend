<?php

namespace App\Services;

use App\Models\Feature;
use App\Models\Subscription;
use App\Interfaces\SubscriptionRepositoryInterface;

class SubscriptionService
{
    protected $subscriptionInterface;

    public function __construct(SubscriptionRepositoryInterface $subscriptionInterface)
    {
        $this->subscriptionInterface = $subscriptionInterface;
    }

    public function getSubscription()
    {
        return $this->subscriptionInterface->getSubscription();
    }

    public function getSubscriptionById($id)
    {
        return $this->subscriptionInterface->getSubscriptionById($id);
    }

    public function storeSubscription($data)
    {
        $feature = Subscription::create($data);

        return $feature;
    }

    public function updateSubscriptionById($data, $id)
    {
        $startTime = microtime(true);

        $feature = Subscription::where('id', $id)->first();

        if (!$feature) {
            return response()->error(request(), null, 'Subscription not found', 404, $startTime);
        }

        $feature->update($data);

        return response()->success(request(), $feature, 'Subscription Updated Successfully.', 200, $startTime, 1);
    }

    public function deleteSubscriptionById($id)
    {
        $startTime = microtime(true);

        $feature = Subscription::where('id', $id)->first();

        if (!$feature) {
            return response()->error(request(), null, 'Subscription not found', 404, $startTime);
        }
        $feature->delete();

        return response()->success(request(), $feature, 'Subscription Deleted Successfully.', 200, $startTime, 1);
    }
}
