<?php

namespace App\Repositories;

use App\Models\StoreProduct;

class StoreProductRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct(StoreProduct::class);
    }
}
