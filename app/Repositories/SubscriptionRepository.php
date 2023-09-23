<?php

namespace App\Repositories;

use App\Models\Feature;
use App\Interfaces\SubscriptionRepositoryInterface;
use App\Models\Subscription;

class SubscriptionRepository implements SubscriptionRepositoryInterface
{
    public function getSubscription()
    {
        $subscription = Subscription::with('features')->get();

        return $subscription;
    }

    public function getSubscriptionById($id)
    {
        $startTime = microtime(true);

        $subscription = Subscription::where('id', $id)->with('features')->get();

        return $subscription;
        // if ($subscription) {
        //     return response()->success(request(), $subscription, 'Subscription Found Successfully', 200, $startTime, 1);
        // } else {
        //     return response()->error(request(), null, "Subscription not found", 404, $startTime);
        // }
    }
}
