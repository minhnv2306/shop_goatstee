<?php

namespace App\Models\Relations;

use App\Models\Product;
use App\Models\Size;

trait CategoryRelations
{
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function sizes()
    {
        return $this->hasMany(Size::class);
    }
}
