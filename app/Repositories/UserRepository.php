<?php

namespace App\Repositories;

use App\Repositories\Contracts\UserRepository as BaseRepository;

class UserRepository implements BaseRepository
{
    public function saveInfor($user, $data)
    {
        $user->update($data);
    }
}
