<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Feature;
use App\Interfaces\PostRepositoryInterface;
use App\Interfaces\FeatureRepositoryInterface;
use App\Models\SubscriptionProfile;

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
        $post = Post::create($data);

        return $post;
    }

    public function updatePostById($data, $id)
    {
        $startTime = microtime(true);

        $post = Post::where('id', $id)->first();

        if (!$post) {
            return response()->error(request(), null, 'Post not found', 404, $startTime);
        }

        $post->update($data);

        return response()->success(request(), $post, 'Post Updated Successfully.', 200, $startTime, 1);
    }

    public function deletePostById($id)
    {
        $startTime = microtime(true);

        $post = Post::where('id', $id)->first();

        if (!$post) {
            return response()->error(request(), null, 'Post not found', 404, $startTime);
        }
        $post->delete();

        return response()->success(request(), $post, 'Post Deleted Successfully.', 200, $startTime, 1);
    }

    public function getSubscriptionByPostId($id)
    {
        $startTime = microtime(true);

        $data = SubscriptionProfile::where('profile_id', $id)->get();

        if (!$data) {
            return response()->error(request(), null, 'Post not found', 404, $startTime);
        }

        return $data;
    }
}
