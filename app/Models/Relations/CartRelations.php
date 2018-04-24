<?php

namespace App\Models\Relations;

use App\Models\CartProduct;

trait CartRelations
{
    public function cartProducts()
    {
        return $this->hasMany(CartProduct::class);
    }
}
