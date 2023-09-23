<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface CategoryRepositoryInterface {

    public function getCategory();

    public function getCategoryById($id);


}
