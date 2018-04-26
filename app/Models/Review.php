<?php

namespace App\Models;

use App\Models\Relations\ReviewRelations;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use ReviewRelations;

    protected $guarded = ['id'];
}
