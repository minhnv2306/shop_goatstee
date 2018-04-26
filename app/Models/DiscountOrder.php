<?php

namespace App\Models;

use App\Models\Relations\DiscountOrderRelations;
use Illuminate\Database\Eloquent\Model;

class DiscountOrder extends Model
{
    use DiscountOrderRelations;

    protected $fillable = [
        'order_id',
        'discount_id',
    ];
}
