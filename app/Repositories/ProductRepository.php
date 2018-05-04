<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct(Product::class);
    }

    public function create($data)
    {
        return Product::create($data);
    }

    public function createMany($product, $data)
    {
        $product->storeProducts()->createMany($data);
    }

    public function getTypeProduct()
    {
        $modelInstance = $this->model;
        return $modelInstance::getTypeProduct();
    }
}
