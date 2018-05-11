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
                return '<span class="label label-danger">' . trans('sites.order.status_1') . '</span>';
            case self::PENDDING_STATUS:
                return '<span class="label label-warning">' . trans('sites.order.status_2') . '</span>';
            case self::SHIPPING_STATUS:
                return '<span class="label label-primary">' . trans('sites.order.status_3') . '</span>';
            default:
                return '<span class="label label-success">' . trans('sites.order.status_4') . '</span>';
        }
    }

    public static function getArrayStatus()
    {
        return [
            self::CANCEL_STATUS => trans('sites.order.status_1'),
            self::PENDDING_STATUS => trans('sites.order.status_2'),
            self::SHIPPING_STATUS => trans('sites.order.status_3'),
            self::FINISH_STATUS => trans('sites.order.status_4'),
        ];
    }
}
