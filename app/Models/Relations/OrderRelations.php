<?php

namespace App\Models\Relations;

use App\Models\DiscountOrder;
use App\Models\ProductOrder;
use App\Models\User;

trait OrderRelations
{
    public function discountOrders()
    {
        return $this->hasMany(DiscountOrder::class);
    }

    public function productOrders()
    {
        return $this->hasMany(ProductOrder::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
