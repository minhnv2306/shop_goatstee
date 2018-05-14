<?php

namespace App\Models\Accessors;

trait UserAccessors
{
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
