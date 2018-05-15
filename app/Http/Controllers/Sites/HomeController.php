<?php

namespace App\Http\Controllers\Sites;

use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Utilities\Request;

class HomeController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function home()
    {
        $bestSellingProducts = $this->productRepository->getBestSelling(Product::TAKE_HOME_PAGE);
        $newProducts = $this->productRepository->getNewProducts(Product::TAKE_HOME_PAGE);

        // Add avatar attribute for best selling product
        foreach ($bestSellingProducts as $bestSellingProduct) {
            $product = $bestSellingProduct->product;
            $bestSellingProduct['avatar'] = $this->productRepository->getAvatar($product);
        }

        // Add avatar attribute for new product
        foreach ($newProducts as $product) {
            $product['avatar'] = $this->productRepository->getAvatar($product);
        }

        return view('sites.home', [
            'bestSellingProducts' => $bestSellingProducts,
            'newProducts' => $newProducts,
        ]);
    }

    public function aboutUs()
    {
        return view('sites.aboutUs');
    }

    public function contact()
    {
        return view('sites.contact');
    }

    public function sizeChart()
    {
        return view('sites.size-chart');
    }

    public function faqs()
    {
        return view('sites.faqs');
    }
}
