<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\Image;
use App\Repositories\Contracts\ProductInterfaceRepository;
use Illuminate\Support\Facades\Auth;

class ProductRepository extends BaseRepository implements ProductInterfaceRepository
{
    public function __construct()
    {
        parent::__construct(Product::class);
    }

    public function create($data)
    {
        return Product::create($data);
    }

    public function delele($model)
    {
        $model->update([
            'deleted_id' => Auth::user()->id,
        ]);
    }

    public function createMany($product, $data)
    {
        $product->storeProducts()->createMany($data);
    }

    public function getAll($atrribute)
    {
        return Product::where([
            'deleted_id' => 0
        ])->get($atrribute);
    }

    /**
     * Get type of product
     * @return mixed
     */
    public function getTypeProduct()
    {
        $modelInstance = $this->model;
        return $modelInstance::getTypeProduct();
    }

    /**
     * Get model avatar image
     * @param $product
     * @return Image model
     */
    public function getAvatar($product)
    {
        return Image::where([
            'imageable_type' => Product::IMAGE_AVATAR,
            'imageable_id' => $product->id,
        ])->get();
    }

    /**
     * Get all description image of product
     * @param $product
     * @return Collection Image
     */
    public function getDescriptionImages($product)
    {
        return Image::where([
            'imageable_id' => $product->id,
            'imageable_type' => Product::IMAGE_DESCRIPTION
        ])->get(['link', 'id']);
    }

    /**
     * Get all images of product (avatar + description)
     * @param $product
     * @return Collection Image
     */
    public function getAllImages($product)
    {
        return Image::where([
                'imageable_id' => $product->id,
            ])
            ->whereIn('imageable_type', [Product::IMAGE_AVATAR, Product::IMAGE_DESCRIPTION])
            ->get(['link', 'id']);
    }

    /**
     * Get all store products of product
     * @param $product
     * @return mixed
     */
    public function getAllStoreProducts($product)
    {
        return $product->storeProducts;
    }
}
