<?php

namespace App\Http\Controllers\Sites;

use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class CategoryController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;

    public function __construct(
        ProductRepository $productRepository,
        CategoryRepository $categoryRepository
    ) {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function show($categoryId, Request $request)
    {
        $orderByArray = Product::getOrderBy();
        $orderBySelected = empty($request->orderby) ? 0 : $request->orderby;
        $attribute = [
            'orderby' => $orderBySelected,
        ];
        $products = $this->productRepository->getAllProductOfCategory($categoryId, $attribute);

        // Add avatar attribute to product
        foreach ($products as $product) {
            $link = $this->productRepository->getAvatar($product)[0]->link;
            $product['link'] = substr($link, 9);
        }

        $data = compact('products', 'categoryId', 'orderByArray', 'orderBySelected');

        return view('sites.category.index', $data);
    }

    public function getProducts(Request $request)
    {
        $skipNumber = $request->count * config('app.paginate_product');
        $products = $this->categoryRepository->getProductWithAvatarOfCategory(
            $request->categoryId,
            config('app.paginate_product'),
            $skipNumber
        );

        $data = compact('products');

        return view('sites.category.ajax-get-product', $data);
    }
}
