<?php

namespace App\Models\Relations;

use App\Models\City;

trait StateRelations
{
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
