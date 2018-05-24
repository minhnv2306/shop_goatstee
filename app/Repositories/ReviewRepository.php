<?php

namespace App\Repositories;

use App\Models\Review;
use App\Repositories\Contracts\ReviewInterfaceRepository;

class ReviewRepository extends BaseRepository implements ReviewInterfaceRepository
{
    public function __construct()
    {
        parent::__construct(Review::class);
    }
}
