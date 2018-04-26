<?php

namespace App\Models;

use App\Models\Relations\OrderRelations;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use OrderRelations;

    protected $fillable = [
        'user_id',
        'price',
        'status',
        'customer_name',
        'customer_email',
        'phone',
        'billing_name',
        'billing_address',
        'shipping_name',
        'shipping_address',
        'note',
    ];
}
