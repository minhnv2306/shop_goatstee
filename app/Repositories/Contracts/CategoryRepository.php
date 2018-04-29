<?php

namespace App\Repositories\Contracts;

interface CategoryRepository
{
    public function createNewCategory($data);
    public function getAllCategory();
    public function updateCategory($cate, $data);
    public function deleleCategory($cate);
}
