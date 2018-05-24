<?php

namespace App\Repositories;

use App\Models\CartProduct;
use App\Repositories\Contracts\CartProductInterfaceRepository;

class CartProductRepository extends BaseRepository implements CartProductInterfaceRepository
{
    public function __construct()
    {
        parent::__construct(CartProduct::class);
    }
}
