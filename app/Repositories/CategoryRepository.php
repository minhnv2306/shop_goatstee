<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepository as BaseRepository;

class CategoryRepository implements BaseRepository
{
    public function createNewCategory($data)
    {
        Category::create($data);
    }

    public function getAllCategory()
    {
        return Category::get([
            'name',
            'id',
        ]);
    }

    public function updateCategory($cate, $data)
    {
        $cate->update($data);
    }

    public function deleleCategory($cate)
    {
        $cate->delete();
    }
}
