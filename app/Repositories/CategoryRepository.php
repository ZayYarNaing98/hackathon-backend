<?php

namespace App\Repositories;

use App\Models\Category;
use App\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getCategory()
    {
        $category = Category::with('profile')->get();

        return $category;
    }

    public function getCategoryById($id)
    {
        $startTime = microtime(true);

        $category = Category::where('id', $id)->with('profile')->first();

        if ($category) {
            return response()->success(request(), $category, 'Category Found Successfully', 200, $startTime, 1);
        } else {
            return response()->error(request(), null, "Category not found", 404, $startTime);
        }
    }
}
