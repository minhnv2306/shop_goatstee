<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Contracts\CategoryInterfaceRepository;

class CategoryRepository extends BaseRepository implements CategoryInterfaceRepository
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

    public function getCategoryHasSize($attribute)
    {
        return Category::has('sizes')->get($attribute);
    }
}
