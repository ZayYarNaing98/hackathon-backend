<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\Feature;
use App\Interfaces\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    public function getPost()
    {
        $post = Post::with('profile', 'post_attachment')->get();

        return $post;
    }

    public function getPostById($id)
    {
        $startTime = microtime(true);

        $post = Post::where('id', $id)->with('profile','post_attachment')->get();

        if ($post) {
            return response()->success(request(), $post, 'Post Found Successfully', 200, $startTime, 1);
        } else {
            return response()->error(request(), null, "Post not found", 404, $startTime);
        }
    }
}
