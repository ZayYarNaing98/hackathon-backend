<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'profile_id' => 1,
            'subscription_id' => 3,
            'title' => 'Summer Sale',
            'description' => 'Rem ipsum sedubel anatis rem ipsum sedubel anatis',
        ]);

        Post::create([
            'profile_id' => 1,
            'subscription_id' => 3,
            'title' => 'Big Sale',
            'description' => "Don't know where to start in?",
        ]);

        Post::create([
            'profile_id' => 1,
            'subscription_id' => 3,
            'title' => 'Gift Voucher',
            'description' => 'The trainees can enroll from start today. don’t miss chance',
        ]);

        Post::create([
            'profile_id' => 1,
            'subscription_id' => 3,
            'title' => 'Giveaway Time',
            'description' => "Don't know where to start in?",
        ]);

        Post::create([
            'profile_id' => 2,
            'subscription_id' => 3,
            'title' => 'Electronics collection',
            'description' => "Don't know where to start in?",
        ]);

        Post::create([
            'profile_id' => 2,
            'subscription_id' => 3,
            'title' => '9.9 super sale',
            'description' => "Don't know where to start in?",
        ]);

        Post::create([
            'profile_id' => 2,
            'subscription_id' => 3,
            'title' => 'Organic skincare sale',
            'description' => 'The trainees can enroll from start today. don’t miss chance',
        ]);

        Post::create([
            'profile_id' => 1,
            'subscription_id' => 3,
            'title' => 'New product release',
            'description' => "Don't know where to start in?",
        ]);

    }
}
