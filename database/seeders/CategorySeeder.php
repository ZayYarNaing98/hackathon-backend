<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Education',
        ]);

        Category::create([
            'name' => 'Healthy',
        ]);

        Category::create([
            'name' => 'Beauty',
        ]);

        Category::create([
            'name' => 'Travel',
        ]);

        Category::create([
            'name' => 'Food',
        ]);

        Category::create([
            'name' => 'Electronics',
        ]);

        Category::create([
            'name' => 'Shoes',
        ]);

        Category::create([
            'name' => 'Bags',
        ]);

        Category::create([
            'name' => 'Sports and Fitness',
        ]);

        Category::create([
            'name' => 'Clothing',
        ]);

        Category::create([
            'name' => 'IT Hardware, Software',
        ]);

        Category::create([
            'name' => 'Watch',
        ]);

        Category::create([
            'name' => 'Consultant',
        ]);
    }
}
