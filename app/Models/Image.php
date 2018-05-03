<?php

namespace App\Models;

use App\Models\Accessors\ImageAccessors;
use App\Models\Mutators\ImageMutators;
use App\Models\Relations\ImageRelations;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use ImageRelations, ImageMutators, ImageAccessors;

    protected $guarded = ['id'];
}
