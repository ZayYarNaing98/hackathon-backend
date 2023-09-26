<?php

namespace Database\Seeders;

use App\Models\Subscription;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subscription::create([
            'name' => 'Basic Plan',
            'price' => '9,000 MMK',
        ]);

        Subscription::create([
            'name' => 'Standard Plan',
            'price' => '18,000 MMK',
        ]);

        Subscription::create([
            'name' => 'Premium Plan',
            'price' => '27,000 MMK'
        ]);
    }
}
