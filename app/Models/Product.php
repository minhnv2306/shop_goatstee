<?php

namespace App\Models;

use App\Models\Relations\ProductRelations;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use ProductRelations;

    const IMAGE_AVATAR = 1;
    const IMAGE_DESCRIPTION = 2;
    const IMAGE_NUMBER = 5;
    protected $guarded = ['id'];

    public static function getTypeProduct()
    {
        return [
            'Domestic' => 'Domestic',
            'Imported' => 'Imported',
        ];
    }
}
