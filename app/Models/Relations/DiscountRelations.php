<?php

namespace App\Models\Relations;

use App\Models\DiscountOrder;

trait DiscountRelations
{
    public function discountOrder()
    {
        return $this->belongsTo(DiscountOrder::class);
    }

}
