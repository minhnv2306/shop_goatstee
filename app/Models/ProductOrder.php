<?php

namespace App\Models;

use App\Models\Relations\ProductOrderRelations;
use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    use ProductOrderRelations;

    protected $fillable = [
        'store_product_id',
        'number',
        'order_id',
        'price',
    ];
}
