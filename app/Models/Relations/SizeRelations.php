<?php

namespace App\Models\Relations;

use App\Models\Category;
use App\Models\StoreProduct;

trait SizeRelations
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function storeProducts()
    {
        return $this->hasMany(StoreProduct::class);
    }
}
