<?php

namespace App\Repositories;

use App\Models\CartProduct;
use App\Models\Order;
use App\Models\ProductOrder;
use App\Repositories\Contracts\OrderInterfaceRepository;
use Illuminate\Support\Facades\DB;

class OrderRepository extends BaseRepository implements OrderInterfaceRepository
{
    public function __construct()
    {
        parent::__construct(Order::class);
    }

    public function createOrder($data, $cartProductIds)
    {
        DB::beginTransaction();
        $order = Order::create($data);
        foreach ($cartProductIds as $cartProductId) {
            $cartProduct = CartProduct::findOrFail($cartProductId);

            /* If the number of product in cart less than the number of product in store,
                add it to order
            */
            if ($cartProduct->number <= $cartProduct->storeProduct->number) {
                ProductOrder::create([
                    'store_product_id' => $cartProduct->store_product_id,
                    'number' => $cartProduct->number,
                    'order_id' => $order->id,
                    'price' => $cartProduct->price,
                ]);

                $number = (int)$cartProduct->number;
                $cartProduct->storeProduct->decrement('number', $number);
                $cartProduct->storeProduct->increment('sale_number', $number);
                $cartProduct->delete();
            } else {
                DB::rollback();

                return 0;
            }
        }
        DB::commit();

        return 1;
    }

    /**
     * Get all order of a user
     * @param $user
     * @return mixed
     */
    public function getAllOrderOfUser($user)
    {
        return $user->orders()
            ->orderBy('id', 'desc')
            ->get();
    }
}
