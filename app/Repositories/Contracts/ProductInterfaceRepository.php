<?php

namespace App\Repositories\Contracts;

interface ProductInterfaceRepository
{
    public function createMany($product, $data);
    public function getTypeProduct();
    public function getAvatar($product);
    public function getDescriptionImages($product);
    public function getAllImages($product);
    public function getAllStoreProducts($product);
}
