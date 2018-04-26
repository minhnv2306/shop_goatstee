<?php

namespace App\Models\Relations;

use App\Models\Country;
use App\Models\State;
use App\Models\User;

trait CityRelations
{
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->hasMany(State::class);
    }
}
