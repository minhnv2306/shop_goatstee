<?php

namespace App\Models;

use App\Models\Relations\CartRelations;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use CartRelations;

    protected $guarded = ['id'];
}
