<?php

namespace App\Repositories;

use App\Models\Role;
use App\Models\User;
use App\Repositories\Contracts\RoleInterfaceRepository;

class RoleRepository extends BaseRepository implements RoleInterfaceRepository
{
    public function __construct()
    {
        parent::__construct(Role::class);
    }

    public function getAllForSite()
    {
        return Role::all();
    }
    public function getAll($atrribute)
    {
        return Role::whereNotIn('id', [User::ROLE_ADMIN, User::ROLE_USER])
            ->get($atrribute);
    }
}
