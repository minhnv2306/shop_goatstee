<?php

namespace App\Policies;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

trait GetACL
{
    public function getACL($objectName)
    {
        return Permission::where([
            ['object_id', Role::getIndexOfObject($objectName)],
            ['role_id', Auth::user()->role_id],
        ])->first();
    }
}
