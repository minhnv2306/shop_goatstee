<?php

namespace App\Models;

use App\Models\Relations\CityRelations;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use CityRelations;

    protected $fillable = [
        'name',
        'country_id',
    ];
}
