<?php

namespace App\Models\Relations;

use App\Models\StoreProduct;

trait ColorRelations
{
    public function storeProducts()
    {
        return $this->hasMany(StoreProduct::class);
    }
}
