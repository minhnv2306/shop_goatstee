<?php

namespace App\Models;

use App\Models\Relations\SizeRelations;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use SizeRelations;

    protected $guarded = ['id'];
}
