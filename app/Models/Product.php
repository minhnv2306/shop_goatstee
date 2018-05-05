<?php

namespace App\Models;

use App\Models\Relations\ProductRelations;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use ProductRelations;

    const IMAGE_AVATAR = 1;
    const IMAGE_DESCRIPTION = 2;
    const IMAGE_NUMBER = 5;
    protected $guarded = ['id'];

    public static function getTypeProduct()
    {
        return [
            'Domestic' => trans('admin.product.domestic'),
            'Imported' => trans('admin.product.imported'),
        ];
    }

    public static function getRatesProduct()
    {
        return [
            '1' => trans('admin.rates.1-star'),
            '2' => trans('admin.rates.2-stars'),
            '3' => trans('admin.rates.3-stars'),
            '4' => trans('admin.rates.4-stars'),
            '5' => trans('admin.rates.5-stars'),
        ];
    }
}
