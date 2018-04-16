<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        return view('sites.home');
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
