<?php

namespace App\Models\Mutators;

trait UserMutators
{
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
