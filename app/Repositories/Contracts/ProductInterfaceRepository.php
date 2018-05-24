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

    public function getNumberOfProduct($productId, $sex = 'all', $sizeId = 0, $colorId = 0);

    public function search($data);

    public function filterInput($input);

    public function getAllProductOfCategory($categoryId, $attribute);

    public function getBestSelling($number);

    public function getNewProducts($number);

    public function findSuggestProduct($key);

    public function getSuggestProducts($categoryId, $productId);
}
