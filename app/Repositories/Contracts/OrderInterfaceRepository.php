<?php

namespace App\Repositories\Contracts;

interface OrderInterfaceRepository
{
    public function createOrder($data, $cartProductIds);
}
