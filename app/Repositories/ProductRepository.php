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
                ['product_id', '=', $productId],
                ['number', '>', 0]
            ])->pluck('size_id')->all();
        } else {
            if ($color_id == 0) {
                $size_ids = StoreProduct::where([
                    ['product_id', '=', $productId],
                    ['sex', '=', $sex],
                    ['number', '>', 0]
                ])->pluck('size_id')->all();
            } else {
                $size_ids = StoreProduct::where([
                    ['product_id', '=', $productId],
                    ['sex', '=', $sex],
                    ['number', '>', 0],
                    ['color_id', '=', $color_id],
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
                ['product_id', '=', $productId],
                ['number', '>', 0]
            ])->pluck('color_id')->all();
        } else {
            if ($size_id == 0) {
                $color_ids = StoreProduct::where([
                    ['product_id', '=', $productId],
                    ['number', '>', 0],
                    ['sex', '=', $sex],
                ])->pluck('color_id')->all();
            } else {
                $color_ids = StoreProduct::where([
                    ['product_id', '=', $productId],
                    ['number', '>', 0],
                    ['sex', '=', $sex],
                    ['size_id', '=', $size_id],
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

    /**
     * Get number of product in storage
     * @param $productId
     * @param string $sex
     * @param int $sizeId
     * @param int $colorId
     * @return int
     */
    public function getNumberOfProduct($productId, $sex = 'all', $sizeId = 0, $colorId = 0)
    {
        $storeProduct = StoreProduct::where([
            'product_id' => $productId,
            'sex' => $sex,
            'size_id' => $sizeId,
            'color_id' => $colorId,
        ])->first();

        return empty($storeProduct) ? 0 : $storeProduct->number;
    }

    /**
     * Search product
     * @param $data
     * @return mixed
     */
    public function search($data)
    {
        $newKey = self::filterInput($data['key']);
        $text = '%' . $newKey . '%';
        $query = Product::where('name', 'like', $text);
        $orderBy = $data['orderby'];
        switch ($orderBy) {
            case 1:
                $query = $query->orderBy('price', 'asc');
                break;
            case 2:
                $query = $query->orderBy('price', 'desc');
                break;
            default:
                $query = $query->orderBy('id', 'desc');
        }

        return $query->paginate(Product::PAGINATE);
    }

    /**
     * Filter input form client
     * @param $input
     * @return null|string|string[]
     */
    public function filterInput($input)
    {
        $input = trim($input);
        $pattern = '/[!@#$%^&*()_+-= {}]/';
        $replacement = '';
        $newKey = preg_replace($pattern, $replacement, $input);

        return $newKey;
    }

    public function getAllProductOfCategory($categoryId, $attribute)
    {
        $query = Product::where('category_id', $categoryId);
        $orderBy = empty($attribute['orderby']) ? 0 : $attribute['orderby'];
        switch ($orderBy) {
            case 1:
                $query = $query->orderBy('price', 'asc');
                break;
            case 2:
                $query = $query->orderBy('price', 'desc');
                break;
            default:
                $query = $query->orderBy('id', 'desc');
        }

        return $query->paginate(Product::PAGINATE);
    }

    /**
     * Get best selling product
     * @param $number
     * @return mixed
     */
    public function getBestSelling($number)
    {
        return StoreProduct::selectRaw('count(*) AS cnt, product_id')
            ->groupBy('product_id')
            ->orderBy('cnt', 'DESC')
            ->limit($number)
            ->get();
    }

    /**
     * Get new product
     * @param $number
     * @return mixed
     */
    public function getNewProducts($number)
    {
        return Product::orderBy('id', 'desc')
            ->take($number)
            ->get();
    }
}
