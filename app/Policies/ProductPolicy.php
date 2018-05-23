<?php

namespace App\Policies;

use App\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
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
        $operation = $this->getACL('product');
        if (array_search(Role::VIEW, json_decode($operation->operation)) === false) {
            return false;
        } else {
            return true;
        }
    }

    public function update()
    {
        $operation = $this->getACL('product');
        if (array_search(Role::UPDATE, json_decode($operation->operation)) === false) {
            return false;
        } else {
            return true;
        }
    }

    public function create()
    {
        $operation = $this->getACL('product');
        if (array_search(Role::CREATE, json_decode($operation->operation)) === false) {
            return false;
        } else {
            return true;
        }
    }

    public function delete()
    {
        $operation = $this->getACL('product');
        if (array_search(Role::DELETE, json_decode($operation->operation)) === false) {
            return false;
        } else {
            return true;
        }
    }
}
