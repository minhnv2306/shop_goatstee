<?php

namespace App\Repositories\Contracts;

interface OrderInterfaceRepository
{
    public function createOrder($data, $cartProductIds);

    public function getAllOrderOfUser($user);
}
