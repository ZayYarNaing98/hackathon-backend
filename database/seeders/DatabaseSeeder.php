<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\ProfileSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\SubscriptionSeeder;
use Database\Seeders\RoleAndPermissionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleAndPermissionSeeder::class);
        $this->call(AdminSeeder::class);

        $this->call(CategorySeeder::class);
        $this->call(SubscriptionSeeder::class);
        $this->call(FeatureSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(ProfileSeeder::class);

        $this->call(PaymentSeeder::class);
        $this->call(SubscriptionProfileSeeder::class);

    }
}
