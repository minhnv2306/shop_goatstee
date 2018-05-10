<?php

namespace App\Models;

use App\Models\Relations\OrderRelations;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const CANCEL_STATUS = 1;
    const PENDDING_STATUS = 2;
    const SHIPPING_STATUS = 3;
    const FINISH_STATUS = 4;

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

    public static function getStatus($index)
    {
        switch ($index) {
            case self::CANCEL_STATUS:
                return trans('sites.order.status_1');
            case self::PENDDING_STATUS:
                return trans('sites.order.status_2');
            case self::SHIPPING_STATUS:
                return trans('sites.order.status_3');
            default:
                return trans('sites.order.status_4');
        }
    }
}
