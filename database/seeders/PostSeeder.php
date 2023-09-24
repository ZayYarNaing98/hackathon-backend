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
            'title' => 'test',
            'description' => 'test',
        ]);

        Post::create([
            'profile_id' => 1,
            'subscription_id' => 3,
            'title' => 'test',
            'description' => 'test',
        ]);

        Post::create([
            'profile_id' => 1,
            'subscription_id' => 3,
            'title' => 'test',
            'description' => 'test',
        ]);

        Post::create([
            'profile_id' => 1,
            'subscription_id' => 3,
            'title' => 'test',
            'description' => 'test',
        ]);

        Post::create([
            'profile_id' => 2,
            'subscription_id' => 3,
            'title' => 'test',
            'description' => 'test',
        ]);

        Post::create([
            'profile_id' => 2,
            'subscription_id' => 3,
            'title' => 'test',
            'description' => 'test',
        ]);

        Post::create([
            'profile_id' => 2,
            'subscription_id' => 3,
            'title' => 'test',
            'description' => 'test',
        ]);

        Post::create([
            'profile_id' => 1,
            'subscription_id' => 3,
            'title' => 'test',
            'description' => 'test',
        ]);

    }
}
