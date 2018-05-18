<?php

namespace App\Models;

use App\Models\Relations\StoreProductRelations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreProduct extends Model
{
    use StoreProductRelations, SoftDeletes;

    protected $fillable = [
        'product_id',
        'color_id',
        'number',
        'sale_number',
        'size_id',
        'sex',
    ];
}
