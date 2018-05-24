<?php

namespace App\Http\Controllers\Sites;

use App\Models\Product;
use App\Repositories\Contracts\ProductInterfaceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductInterfaceRepository $productRepository)
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
        $reviews = $product->reviews;
        $suggestProducts = $this->productRepository->getSuggestProducts($product->category_id, $product->id);
        // Add avatar attribute to product
        foreach ($suggestProducts as $suggestProduct) {
            $suggestProduct['avatar'] = $this->productRepository->getAvatar($suggestProduct);
        }
        $data = compact(
            'product',
            'avatar',
            'images',
            'colors',
            'sizes',
            'sex',
            'defaultOption',
            'rates',
            'reviews',
            'suggestProducts'
        );

        return view('sites.product.show1', $data);
    }

    public function search(Request $request)
    {
        $orderBySelected = empty($request->orderby) ? 0 : $request->orderby;
        $data = [
            'key' => $request->s,
            'orderby' => $orderBySelected,
        ];
        $key = $this->productRepository->filterInput($request->s);
        $orderByArray = Product::getOrderBy();
        $products = $this->productRepository->search($data);

        // Add avatar attribute to product
        foreach ($products as $product) {
            $link = $this->productRepository->getAvatar($product)[0]->link;
            $product['link'] = substr($link, 9);
        }
        $products->withPath('?s=' . $key . '&' . 'orderby=' . $orderBySelected);

        $data = compact('products', 'key', 'orderByArray', 'orderBySelected');

        return view('sites.product.search', $data);
    }

    public function getColors(Request $request)
    {
        $colors = $this->productRepository->getColors($request->productId, $request->sex);

        $data = compact('colors');

        return view('sites.product.get-color', $data);
    }

    public function getSizes(Request $request)
    {
        $sizes = $this->productRepository->getSizes($request->productId, $request->sex, $request->color_id);

        $data = compact('sizes');

        return view('sites.product.get-size', $data);
    }

    public function getNumber(Request $request)
    {
        $number = $this->productRepository->getNumberOfProduct(
            $request->productId,
            $request->sex,
            $request->sizeId,
            $request->colorId
        );

        return $number;
    }

    public function find(Request $request)
    {
        return response()->json($this->productRepository->findSuggestProduct($request->q));
    }
}
