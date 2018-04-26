<?php

namespace App\Models\Relations;

use App\Models\Product;

trait ReviewRelations
{
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
