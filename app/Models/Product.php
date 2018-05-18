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
    const PAGINATE = 8;
    const TAKE_HOME_PAGE = 8;
    const SUGGEST_PRODUCT = 5;

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
            '0' => '',
            '1' => trans('admin.rates.1-star'),
            '2' => trans('admin.rates.2-stars'),
            '3' => trans('admin.rates.3-stars'),
            '4' => trans('admin.rates.4-stars'),
            '5' => trans('admin.rates.5-stars'),
        ];
    }

    public static function getOrderBy()
    {
        return [
            '0' => trans('sites.search.sort_1'),
            '1' => trans('sites.search.sort_2'),
            '2' => trans('sites.search.sort_3'),
        ];
    }
}
