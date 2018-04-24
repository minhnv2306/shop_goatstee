<?php

namespace App\Models\Relations;

use App\Models\CartProduct;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;

trait StoreProductRelations
{
    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function cartProducts()
    {
        return $this->hasMany(CartProduct::class);
    }
}
