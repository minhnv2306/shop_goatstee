<?php

namespace App\Repositories;

use App\Models\StoreProduct;
use App\Repositories\Contracts\StoreProductInterfaceRepository;

class StoreProductRepository extends BaseRepository implements StoreProductInterfaceRepository
{
    public function __construct()
    {
        parent::__construct(StoreProduct::class);
    }

    /**
     * Get storage product model
     * @param $id
     * @return Model
     */
    public function getStorageProduct($id)
    {
        return StoreProduct::findOrFail($id);
    }

    /**
     * Find store product base on attribute
     * @param $attribute
     * @return mixed
     */
    public function findStoreProduct($attribute)
    {
        return StoreProduct::where($attribute)
            ->first();
    }

    public function increment($model, $column, $number)
    {
        $model->increment($column, $number);
    }

    /**
     * Find store product base on id
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return StoreProduct::findorFail($id);
    }
}
