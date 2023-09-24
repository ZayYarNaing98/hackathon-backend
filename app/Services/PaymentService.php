<?php

namespace App\Services;

use App\Models\Payment;
use App\Models\SubscriptionProfile;
use App\Interfaces\FeatureRepositoryInterface;

class PaymentService
{
    // protected $paymentInterface;

    // public function __construct(PaymentRepositoryInterface $paymentInterface)
    // {
    //     $this->paymentInterface = $paymentInterface;
    // }

    public function payment($data)
    {
        $result = Payment::create($data);

        SubscriptionProfile::create([
            'subscription_id' => $data['subscription_id'],
            'profile_id' => $data['profile_id'],
        ]);

        return $result;


    }
}
