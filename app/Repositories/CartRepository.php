<?php

namespace App\Repositories;

use App\Models\Cart;
use App\Models\StoreProduct;
use App\Models\CartProduct;

class CartRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct(Cart::class);
    }

    public function create($attribute)
    {
        $storeProduct = StoreProduct::where([
            ['product_id', $attribute['product_id']],
            ['color_id', $attribute['color_id']],
            ['size_id', $attribute['size_id']]
        ])->firstOrFail();

        $cart = Cart::firstOrCreate([
            'hash_cart' => session('hash')[0]
        ]);
        $cartProduct = CartProduct::firstOrCreate([
            'cart_id' => $cart->id,
            'store_product_id' => $storeProduct->id
        ]);
        $price = $storeProduct->product->price * $attribute['number'];
        $cartProduct->increment('number', (int)$attribute['number']);
        $cartProduct->increment('price', $price);
    }

    public function getProductInCart()
    {
        $cart = Cart::where('hash_cart', session('hash'))
            ->first();
        if (!empty($cart)) {
            $cartProducts = $cart->cartProducts;
        } else {
            $cartProducts = [];
        }

        return $cartProducts;
    }
}
