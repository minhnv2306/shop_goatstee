<?php

namespace App\Repositories;

use App\Models\CartProduct;
use App\Models\Order;
use App\Models\ProductOrder;
use App\Repositories\Contracts\OrderInterfaceRepository;

class OrderRepository extends BaseRepository implements OrderInterfaceRepository
{
    public function __construct()
    {
        parent::__construct(Order::class);
    }

    public function createOrder($data, $cartProductIds)
    {
        $order = Order::create($data);
        foreach ($cartProductIds as $cartProductId) {
            $cartProduct = CartProduct::findOrFail($cartProductId);
            ProductOrder::create([
                'store_product_id' => $cartProduct->store_product_id,
                'number' => $cartProduct->number,
                'order_id' => $order->id,
                'price' => $cartProduct->price,
            ]);
            $cartProduct->delete();
        }
    }
}
