<?php

namespace App\Models;

use App\Models\Relations\StateRelations;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use StateRelations;

    protected $fillable = [
        'name',
        'city_id',
    ];
}
