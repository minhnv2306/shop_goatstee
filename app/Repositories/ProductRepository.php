<?php

namespace App\Repositories;

use App\Models\Color;
use App\Models\Product;
use App\Models\Image;
use App\Models\Size;
use App\Models\StoreProduct;
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

    public function getName($product_id)
    {
        $modelInstance = $this->model;
        $product = $modelInstance::find($product_id);
        if (empty($product)) {
            return '';
        } else {
            return $product->name;
        }
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
     * Get model avatar image of a product
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

    /**
     * Get all sizes of product with sex and color_id
     * @param $productId
     * @param string $sex
     * @param int $color_id
     * @return mixed
     */
    public function getSizes($productId, $sex = 'all', $color_id = 0)
    {
        if ($sex == 'all') {
            $size_ids = StoreProduct::where([
                'product_id' => $productId,
            ])->pluck('size_id')->all();
        } else {
            if ($color_id == 0) {
                $size_ids = StoreProduct::where([
                    'product_id' => $productId,
                    'sex' => $sex,
                ])->pluck('size_id')->all();
            } else {
                $size_ids = StoreProduct::where([
                    'product_id' => $productId,
                    'sex' => $sex,
                    'color_id' => $color_id,
                ])->pluck('size_id')->all();
            }
        }

        return Size::whereIn('id', $size_ids)->get(['id', 'name']);
    }

    /**
     * Get all colors of product with sex and size_id
     * @param $productId
     * @param string $sex
     * @param int $size_id
     * @return mixed
     */
    public function getColors($productId, $sex = 'all', $size_id = 0)
    {
        if ($sex == 'all') {
            $color_ids = StoreProduct::where([
                'product_id' => $productId,
            ])->pluck('color_id')->all();
        } else {
            if ($size_id == 0) {
                $color_ids = StoreProduct::where([
                    'product_id' => $productId,
                    'sex' => $sex,
                ])->pluck('color_id')->all();
            } else {
                $color_ids = StoreProduct::where([
                    'product_id' => $productId,
                    'sex' => $sex,
                    'size_id' => $size_id,
                ])->pluck('color_id')->all();
            }
        }

        return Color::whereIn('id', $color_ids)->get(['id', 'name']);
    }

    /**
     * Get link avatar of products
     * @param $products
     * @return array
     */
    public function getAvatarOfProducts($products)
    {
        $avatars = [];
        foreach ($products as $product) {
            $avatar = self::getAvatar($product);
            array_push($avatars, $avatar[0]->link);
        }

        return $avatars;
    }
}
