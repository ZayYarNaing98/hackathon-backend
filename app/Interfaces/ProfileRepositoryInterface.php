<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface ProfileRepositoryInterface
{
    public function getProfile();

    public function getProfileById($id);
}
