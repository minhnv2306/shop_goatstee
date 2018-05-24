<?php

namespace App\Http\Controllers\Sites;

use App\Repositories\Contracts\CategoryInterfaceRepository;
use App\Repositories\Contracts\ProductInterfaceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class CategoryController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;

    public function __construct(
        ProductInterfaceRepository $productRepository,
        CategoryInterfaceRepository $categoryRepository
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
        $page = empty($request->page) ? 1 : $request->page;

        $products->withPath('?orderby=' . $orderBySelected);
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
