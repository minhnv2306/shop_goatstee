<?php

namespace App\Repositories;

use App\Models\Image;

class ImageRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct(Image::class);
    }

    /**
     * Get image model
     * @param $id
     * @return Model
     */
    public function getImage($id)
    {
        return Image::findOrFail($id);
    }
}
