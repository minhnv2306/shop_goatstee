<?php

namespace App\Models;

use App\Models\Relations\CartProductRelations;
use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    use CartProductRelations;

    protected $guarded = ['id'];
}
