<?php

namespace App\Models;

use App\Models\Relations\StoreProductRelations;
use Illuminate\Database\Eloquent\Model;

class StoreProduct extends Model
{
    use StoreProductRelations;

    protected $fillable = [
        'product_id',
        'color_id',
        'number',
        'sale_number',
        'size_id',
        'sex',
    ];
}
