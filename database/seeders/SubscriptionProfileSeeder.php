<?php

namespace Database\Seeders;

use App\Models\SubscriptionProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriptionProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SubscriptionProfile::create([
            'subscription_id' => 3,
            'profile_id' => 1,
        ]);

        SubscriptionProfile::create([
            'subscription_id' => 3,
            'profile_id' => 2,
        ]);
    }
}
