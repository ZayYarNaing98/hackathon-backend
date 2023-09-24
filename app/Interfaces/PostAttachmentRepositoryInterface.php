<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface PostAttachmentRepositoryInterface
{
    public function getAttachmentByPostId($id);
}
