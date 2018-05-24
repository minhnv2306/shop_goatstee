<?php

namespace App\Models;

use App\Models\Accessors\UserAccessors;
use App\Models\Mutators\UserMutators;
use App\Models\Relations\UserRelations;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    const ROLE_USER = 2;
    const ROLE_ADMIN = 1;
    const ACTIVE = 1;
    const UN_ACTIVE = 0;

    use Notifiable, UserRelations, UserMutators, UserAccessors;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'company',
        'address',
        'email',
        'city_id',
        'role_id',
        'password',
        'active',
        'hash',
    ];
}
