<?php

namespace App\Repositories;

use App\Interfaces\PostAttachmentRepositoryInterface;
use App\Models\PostAttachment;

class PostAttachmentRepository implements PostAttachmentRepositoryInterface
{
    public function getAttachmentByPostId($id)
    {
        $startTime = microtime(true);

        $data = PostAttachment::where('post_id', $id)->get();

        if (!$data) {
            return response()->error(request(), null, 'PostAttachment not found', 404, $startTime);
        }

        $imageUrls = [];

        foreach ($data as $attachment) {
            if ($attachment->attachment_url) {
                $imageUrls[] = asset('postAttachments/' . $attachment->attachment_url);
            }
        }

        return response()->success(request(), $imageUrls, 'PostAttachment Image Found Successfully', 200, $startTime, 1);
    }
}
