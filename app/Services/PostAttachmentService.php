<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\PostAttachment;
use App\Interfaces\PostAttachmentRepositoryInterface;

class PostAttachmentService
{
    protected $attachmentInterface;

    public function __construct(PostAttachmentRepositoryInterface $attachmentInterface)
    {
        $this->attachmentInterface = $attachmentInterface;
    }

    public function getAttachmentByPostId($id)
    {
        return $this->attachmentInterface->getAttachmentByPostId($id);
    }

    public function storePostAttachment(Request $request, $id)
    {
        $attach = [];

        foreach ($request['attachment_url'] as $attachment) {
            $attachUrl = time() . "_" . $attachment->getClientOriginalName();
            $attachment->storeAs('postAttachments/' . $attachUrl);
            $data = PostAttachment::create([
                'post_id' => $id,
                'attachment_url' => $attachUrl
            ]);
            array_push($attach, $data);

            $attachments[] = $data;
        }

        return $attachments;


        return $attach;
    }

    public function deletePostAttachmentById($id)
    {
        $startTime = microtime(true);

        $attach = PostAttachment::where('id', $id)->first();

        if (!$attach) {
            return response()->error(request(), null, 'TicketAttachment not found', 404, $startTime);
        }

        $attach->delete();

        return response()->success(request(), $attach, 'TicketAttachment Deleted Successfully.', 200, $startTime, 1);
    }
}
