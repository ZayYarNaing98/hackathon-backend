<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface SubscriptionRepositoryInterface
{
    public function getSubscription();

    public function getSubscriptionById($id);
}
