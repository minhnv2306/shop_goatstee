<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct(Category::class);
    }

    public function delele($model)
    {
        $model->sizes()->delete();
        parent::delele($model);
    }
}
