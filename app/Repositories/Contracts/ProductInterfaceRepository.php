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
    public function getName($product_id);
    public function getSizes($productId, $sex = 'all', $color_id = 0);
    public function getColors($productId, $sex = 'all', $size_id = 0);
    public function getAvatarOfProducts($products);
}
