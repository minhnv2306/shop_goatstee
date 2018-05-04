<?php

namespace App\Models\Accessors;

trait ImageAccessors
{
    public function getLinkAttribute($value)
    {
        return "/storage/" . "{$value}";
    }
}
