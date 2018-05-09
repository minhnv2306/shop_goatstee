<?php

namespace App\Repositories;

use App\Models\Cart;
use App\Models\StoreProduct;
use App\Models\CartProduct;

class CartProductRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct(Cart::class);
    }
}
