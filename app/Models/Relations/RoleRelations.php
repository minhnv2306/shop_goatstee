<?php

namespace App\Models\Relations;

use App\Models\Role;
use App\Models\User;

trait RoleRelations
{
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
