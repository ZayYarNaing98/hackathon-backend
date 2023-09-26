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
        $subscription = Subscription::where('id', $id)->with('features')->get();

        return $subscription;
    }
}
