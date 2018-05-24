<?php

namespace App\Repositories\Contracts;

interface CartInterfaceRepository
{
    public function getProductInCart();

    public function updateCart($cartProductIds);

    public function removeProductInCart($cartProductId);
}
