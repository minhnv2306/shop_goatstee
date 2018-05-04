<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\Image;

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


    public function getAvatar($product)
    {
        $image = Image::where([
            'imageable_type' => Product::IMAGE_AVATAR,
            'imageable_id' => $product->id,
        ])->get(['link']);

        return empty($image) ? '' : '/storage/' . $image[0]->link;
    }

    public function getAllImages($product)
    {
        return Image::where([
                'imageable_id' => $product->id,
            ])
            ->whereIn('imageable_type', [Product::IMAGE_AVATAR, Product::IMAGE_DESCRIPTION])
            ->get(['link']);
    }
}
