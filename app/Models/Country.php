<?php

namespace App\Models;

use App\Models\Relations\CountryRelations;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use CountryRelations;

    protected $fillable = [
        'name',
        'code',
    ];
}
