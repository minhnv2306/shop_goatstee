<?php

namespace App\Models;

use App\Models\Relations\ColorRelations;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use ColorRelations;

    protected $fillable = ['name'];
}
