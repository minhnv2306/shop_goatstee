<?php

namespace App\Models;

use App\Models\Relations\ReviewRelations;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use ReviewRelations;

    const APPROVED = 1;
    const HIDDEN = 0;

    protected $guarded = ['id'];
}
