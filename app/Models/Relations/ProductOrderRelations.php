<?php

namespace App\Models\Relations;

use App\Models\Order;
use App\Models\StoreProduct;

trait ProductOrderRelations
{
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function storeProduct()
    {
        return $this->belongsTo(StoreProduct::class)->withTrashed();
    }
}
