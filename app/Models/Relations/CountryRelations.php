<?php

namespace App\Models\Relations;

use App\Models\City;

trait CountryRelations
{
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
