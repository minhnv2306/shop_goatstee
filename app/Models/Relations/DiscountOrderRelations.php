<?php

namespace App\Models\Relations;

use App\Models\Discount;
use App\Models\Order;

trait DiscountOrderRelations
{
    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
