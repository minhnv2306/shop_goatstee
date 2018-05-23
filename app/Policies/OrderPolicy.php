<?php

namespace App\Policies;

use App\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization, getACL;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function view()
    {
        $operation = $this->getACL('order');
        if (array_search(Role::VIEW, json_decode($operation->operation)) === false) {
            return false;
        } else {
            return true;
        }
    }

    public function update()
    {
        $operation = $this->getACL('order');
        if (array_search(Role::UPDATE, json_decode($operation->operation)) === false) {
            return false;
        } else {
            return true;
        }
    }
}
