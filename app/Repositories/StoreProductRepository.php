<?php

namespace App\Repositories;

use App\Models\StoreProduct;

class StoreProductRepository extends BaseRepository
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
}
