<?php

namespace App\Models\Relations;

use App\Models\Order;
use App\Models\Role;

trait UserRelations
{
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
