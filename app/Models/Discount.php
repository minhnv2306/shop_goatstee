<?php

namespace App\Models;

use App\Models\Relations\DiscountRelations;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use DiscountRelations;

    protected $fillable = [
        'code',
        'discount',
    ];
}
