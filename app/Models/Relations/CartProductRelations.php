<?php

namespace App\Models\Relations;

use App\Models\Cart;
use App\Models\StoreProduct;

trait CartProductRelations
{
    public function storeProduct()
    {
        return $this->belongsTo(StoreProduct::class)
            ->withTrashed();
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
