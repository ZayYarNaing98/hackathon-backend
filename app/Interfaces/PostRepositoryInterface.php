<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface PostRepositoryInterface
{
    public function getPost();

    public function getPostById($id);
}
