<?php

namespace App\Repositories\Contracts;

interface StoreProductInterfaceRepository
{
    public function getStorageProduct($id);

    public function findStoreProduct($attribute);

    public function increment($model, $column, $number);

    public function find($id);
}
