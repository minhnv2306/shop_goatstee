<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserInterfaceRepository;

class UserRepository extends BaseRepository implements UserInterfaceRepository
{
    public function __construct()
    {
        parent::__construct(User::class);
    }

    public function saveInfor($user, $data)
    {
        $user->update($data);
    }
}
