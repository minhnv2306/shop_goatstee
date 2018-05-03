<?php

namespace App\Models\Mutators;

trait ImageMutators
{
    public function setLinkAttribute($value)
    {
        $this->attributes['link'] = substr($value, 7);
    }
}
