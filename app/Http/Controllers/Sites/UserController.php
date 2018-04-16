<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function showAccount()
    {
        return view('sites.user.my-account');
    }

    public function address()
    {
        return view('sites.user.address');
    }

    public function addressBilling()
    {
        return view('sites.user.billing-address');
    }

    public function addressShipping()
    {
        return view('sites.user.shipping-address');
    }
}
