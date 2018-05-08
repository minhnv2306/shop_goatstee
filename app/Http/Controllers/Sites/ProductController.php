<?php

namespace App\Http\Controllers\Sites;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function show(Product $product)
    {
        $sex = [
            '0' => trans('admin.select_option'),
            trans('admin.men') => trans('admin.men'),
            trans('admin.women') => trans('admin.women'),
        ];
        $defaultOption = [
            '0' => trans('admin.select_option'),
        ];
        $rates = Product::getRatesProduct();
        $avatar = $this->productRepository->getAvatar($product);
        $images = $this->productRepository->getDescriptionImages($product);
        $colors = $this->productRepository->getColors($product->id);
        $sizes = $this->productRepository->getSizes($product->id);

        return view('sites.product.show', [
            'product' => $product,
            'avatar' => $avatar,
            'images' => $images,
            'colors' => $colors,
            'sizes' => $sizes,
            'sex' => $sex,
            'defaultOption' => $defaultOption,
            'rates' => $rates,
        ]);
    }

    public function search()
    {
        return view('sites.product.search');
    }

    public function cart()
    {
        return view('sites.product.cart');
    }

    public function order()
    {
        return view('sites.product.order');
    }

    public function getColors(Request $request)
    {
        $colors = $this->productRepository->getColors($request->productId, $request->sex);

        return view('sites.product.get-color', [
            'colors' => $colors,
        ]);
    }

    public function getSizes(Request $request)
    {
        $sizes = $this->productRepository->getSizes($request->productId, $request->sex, $request->color_id);

        return view('sites.product.get-size', [
            'sizes' => $sizes,
        ]);
    }
}
