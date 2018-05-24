<?php

namespace App\Models;

use App\Models\Relations\RoleRelations;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use RoleRelations;

    const VIEW = 1;
    const CREATE = 2;
    const UPDATE = 3;
    const DELETE = 4;

    protected $fillable = [
        'name',
    ];

    public static function getObjects()
    {
        return [
            '1' => 'user',
            '2' => 'role',
            '3' => 'category',
            '4' => 'color',
            '5' => 'size',
            '6' => 'product',
            '7' => 'order',
        ];
    }

    public static function getIndexOfObject($nameObject)
    {
        return array_search($nameObject, self::getObjects());
    }
}
