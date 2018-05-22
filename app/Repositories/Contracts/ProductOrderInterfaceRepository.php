<?php

namespace App\Repositories\Contracts;

interface ProductOrderInterfaceRepository
{
    public function getProductOfOrder($orderId);
}
