<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface FeatureRepositoryInterface
{
    public function getFeature();

    public function getFeatureById($id);
}
