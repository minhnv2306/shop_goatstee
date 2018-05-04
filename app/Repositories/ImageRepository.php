<?php

namespace App\Repositories;

use App\Models\Image;

class ImageRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct(Image::class);
    }
}
