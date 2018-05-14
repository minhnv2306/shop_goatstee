<?php

namespace App\Repositories;

use App\Models\Review;

class ReviewRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct(Review::class);
    }

    public function create($data)
    {
        $modelInstance = $this->model;

        return $modelInstance::create($data);
    }
}
