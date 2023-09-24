<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Payment::create([
            'type' => 'Kpay',
            'subscription_id' => 3,
        ]);

        Payment::create([
            'type' => 'Kpay',
            'subscription_id' => 3,
        ]);

    }
}
