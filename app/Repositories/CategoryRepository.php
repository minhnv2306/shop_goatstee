<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\Contracts\CategoryInterfaceRepository;
use Illuminate\Support\Facades\DB;

class CategoryRepository extends BaseRepository implements CategoryInterfaceRepository
{
    public function __construct()
    {
        parent::__construct(Category::class);
    }

    public function delele($model)
    {
        if (count($model->products) == 0) {
            $model->sizes()->delete();
            parent::delele($model);

            return 1;
        } else {
            return 0;
        }
    }

    /**
     * Get all category which have size
     * @param $attribute
     * @return mixed
     */
    public function getCategoryHasSize($attribute)
    {
        return Category::has('sizes')->get($attribute);
    }

    /**
     * Get all category which have product
     * @param $attribute
     * @return mixed
     */
    public function getCategoryHasProduct($attribute)
    {
        return Category::has('products')->get($attribute);
    }

    /**
     * Get all product with option
     * @param $categoryId
     * @param $take
     * @param int $skip
     * @return mixed
     */
    public function getAllProductOfCategory($categoryId, $take, $skip = 0)
    {
        return Product::where('category_id', $categoryId)
            ->orderBy('id', 'desc')
            ->skip($skip)
            ->take($take)
            ->get();
    }

    /**
     * Join DB, get product with itself avatar
     * @param $categoryId
     * @param $take
     * @param int $skip
     * @return mixed
     */
    public function getProductWithAvatarOfCategory($categoryId, $take, $skip = 0)
    {
        return DB::table('products')
            ->join('images', 'products.id', '=', 'images.imageable_id')
            ->where('images.imageable_type', Product::IMAGE_AVATAR)
            ->where('products.category_id', $categoryId)
            ->orderBy('products.id', 'desc')
            ->skip($skip)
            ->take($take)
            ->get();
    }
}
