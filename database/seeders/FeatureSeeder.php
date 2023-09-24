<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Feature::create([
            'subscription_id' => 1,
            'name' => 'Free Register for Business Profile'
        ]);

        Feature::create([
            'subscription_id' => 1,
            'name' => 'NewFeeds'
        ]);

        Feature::create([
            'subscription_id' => 1,
            'name' => 'Promotion Request'
        ]);

        Feature::create([
            'subscription_id' => 1,
            'name' => 'Post limit - 2 posts (No Time Limit)'
        ]);

        Feature::create([
            'subscription_id' => 1,
            'name' => 'Social media connection'
        ]);

        Feature::create([
            'subscription_id' => 1,
            'name' => 'Ads from our website'
        ]);

        Feature::create([
            'subscription_id' => 1,
            'name' => 'Can make order'
        ]);

        Feature::create([
            'subscription_id' => 1,
            'name' => 'Payment Gateway'
        ]);
    }
}
