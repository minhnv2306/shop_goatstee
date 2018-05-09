<?php

namespace App\Repositories;

use App\Models\CartProduct;

class CartProductRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct(CartProduct::class);
    }
}
