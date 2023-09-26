<?php

namespace App\Services;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Interfaces\CategoryRepositoryInterface;

class CategoryService
{
    protected $categoryInterface;

    public function __construct(CategoryRepositoryInterface $categoryInterface )
     {
        $this->categoryInterface = $categoryInterface;
    }

    public function getCategory()
    {
        return $this->categoryInterface->getCategory();
    }

    public function getCategoryById($id) {

        return $this->categoryInterface->getCategoryById($id);
    }

    public function storeCategory($data)
     {
        $category = Category::create($data);

        return $category;

    }

    public function updateCategoryById($data, int $id){

        $startTime=microtime(true);

        $category=Category::find($id);

        if(!$category) {
            return response()->error(request(),null,'Category not found',404,$startTime);
        }

        $category->update($data);

        return response()->success(request(),$category ,'Category Updated Successfully.',200,$startTime,1);
    }

    public function deleteCategoryById($id)
    {
       $startTime = microtime(true);

       $category = Category::find($id);

       if(!$category){
        return response()->error(request(),null,'Category not Found', 404,$startTime);
       }

       $category->delete();

       return response()->success(request(),$category, 'Category Deleted Successfully.',200,$startTime,1);
    }


}
