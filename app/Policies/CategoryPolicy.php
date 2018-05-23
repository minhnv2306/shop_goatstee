<?php

namespace App\Policies;

use App\Models\Role;

class CategoryPolicy
{
    use GetACL;
    public function view()
    {
        $operation = $this->getACL('category');
        if (array_search(Role::VIEW, json_decode($operation->operation)) === false) {
            return false;
        } else {
            return true;
        }
    }

    public function create()
    {
        $operation = $this->getACL('category');
        if (array_search(Role::CREATE, json_decode($operation->operation)) === false) {
            return false;
        } else {
            return true;
        }
    }

    public function update()
    {
        $operation = $this->getACL('category');
        if (array_search(Role::UPDATE, json_decode($operation->operation)) === false) {
            return false;
        } else {
            return true;
        }
    }

    public function delete()
    {
        $operation = $this->getACL('category');
        if (array_search(Role::DELETE, json_decode($operation->operation)) === false) {
            return false;
        } else {
            return true;
        }
    }
}
