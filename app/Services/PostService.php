<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Feature;
use App\Interfaces\PostRepositoryInterface;
use App\Interfaces\FeatureRepositoryInterface;

class PostService
{
    protected $postInterface;

    public function __construct(PostRepositoryInterface $postInterface)
    {
        $this->postInterface = $postInterface;
    }

    public function getPost()
    {
        return $this->postInterface->getPost();
    }

    public function getPostById($id)
    {
        return $this->postInterface->getPostById($id);
    }

    public function storePost($data)
    {
        $feature = Post::create($data);

        return $feature;
    }

    public function updateFeatureById($data, $id)
    {
        $startTime = microtime(true);

        $feature = Post::where('id', $id)->first();

        if (!$feature) {
            return response()->error(request(), null, 'Feature not found', 404, $startTime);
        }

        $feature->update($data);

        return response()->success(request(), $feature, 'Feature Updated Successfully.', 200, $startTime, 1);
    }

    public function deleteFeatureById($id)
    {
        $startTime = microtime(true);

        $feature = Post::where('id', $id)->first();

        if (!$feature) {
            return response()->error(request(), null, 'Feature not found', 404, $startTime);
        }
        $feature->delete();

        return response()->success(request(), $feature, 'Feature Deleted Successfully.', 200, $startTime, 1);
    }
}
