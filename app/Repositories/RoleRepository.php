<?php

namespace App\Repositories;

use App\Models\Role;
use App\Models\User;

class RoleRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct(Role::class);
    }

    public function getAll($atrribute)
    {
        return Role::whereNotIn('id', [User::ROLE_ADMIN, User::ROLE_USER])
            ->get($atrribute);
    }
}
