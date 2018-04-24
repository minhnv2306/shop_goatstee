<?php

namespace App\Models;

use App\Models\Relations\ImageRelations;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use ImageRelations;

    protected $guarded = ['id'];
}
