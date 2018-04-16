<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function show()
    {
        return view('sites.product.show');
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
}
