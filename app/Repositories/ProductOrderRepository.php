<?php

namespace App\Repositories;

use App\Models\ProductOrder;
use App\Repositories\Contracts\ProductOrderInterfaceRepository;

class ProductOrderRepository extends BaseRepository implements ProductOrderInterfaceRepository
{
    public function __construct()
    {
        parent::__construct(ProductOrder::class);
    }

    public function getProductOfOrder($orderId)
    {
        return ProductOrder::where('order_id', $orderId)->get();
    }
}
