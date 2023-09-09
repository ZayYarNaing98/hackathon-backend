<?php

namespace App\Interfaces;

use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    public function getUsers():Collection;

    public function getUserById($id);
}
