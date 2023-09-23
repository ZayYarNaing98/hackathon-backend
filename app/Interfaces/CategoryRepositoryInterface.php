<?php

namespace App\Interfaces;

interface CategoryRepositoryInterface
{

    public function getCategory();

    public function getCategoryById($id);
}
