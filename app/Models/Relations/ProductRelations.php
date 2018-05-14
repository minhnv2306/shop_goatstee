<?php

namespace App\Models\Relations;

use App\Models\Category;
use App\Models\Image;
use App\Models\Review;
use App\Models\StoreProduct;

trait ProductRelations
{
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class)
            ->whereApproved(Review::APPROVED)
            ->orderBy('id', 'desc');
    }

    public function storeProducts()
    {
        return $this->hasMany(StoreProduct::class);
    }
}
