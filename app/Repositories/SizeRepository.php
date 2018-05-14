<?php

namespace App\Repositories;

use App\Models\Size;
use App\Repositories\Contracts\SizeInterfaceRepository;

class SizeRepository extends BaseRepository implements SizeInterfaceRepository
{
    public function __construct()
    {
        parent::__construct(Size::class);
    }

    public function delele($model)
    {
        if (count($model->storeProducts) == 0) {
            parent::delele($model);

            return 1;
        } else {
            return 0;
        }
    }
    /**
     * Get all size of a category
     * @param $category_id
     * @return mixed
     */
    public function getSizeOfCategory($categoryId)
    {
        return Size::where([
            'category_id' => $categoryId
        ])->get();
    }
}
