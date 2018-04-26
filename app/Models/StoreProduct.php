<?php

namespace App\Models;

use App\Models\Relations\StoreProductRelations;
use Illuminate\Database\Eloquent\Model;

class StoreProduct extends Model
{
    use StoreProductRelations;
}
