<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface UserRepositoryInterface
{
    public function getUsers(Request $request);

    public function getUserById($id);

    public function getRoleName();
}
