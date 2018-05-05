<?php

namespace App\Http\Controllers\Sites;

use App\Models\Category;
use App\Models\Product;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function show($categoryId)
    {
        $products = $this->categoryRepository->getProductWithAvatarOfCategory(
            $categoryId,
            config('app.paginate_product')
        );

        return view('sites.category.index', [
            'products' => $products,
            'productRepository' => $this->productRepository,
            'categoryId' => $categoryId,
        ]);
    }

    public function getProducts(Request $request)
    {
        $skipNumber = $request->count * config('app.paginate_product');
        $products = $this->categoryRepository->getProductWithAvatarOfCategory(
            $request->categoryId,
            config('app.paginate_product'),
            $skipNumber
        );

        return view('sites.category.ajax-get-product', [
            'products' => $products,
            'productRepository' => $this->productRepository,
        ]);
    }
}
