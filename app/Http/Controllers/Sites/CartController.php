<?php

namespace App\Http\Controllers\Sites;

use App\Repositories\CartRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    protected $cartRepository;
    protected $productRepository;

    public function __construct(
        CartRepository $cartRepository,
        ProductRepository $productRepository
    ) {
        $this->cartRepository = $cartRepository;
        $this->productRepository = $productRepository;
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $attribute = $request->only([
                'product_id',
                'color_id',
                'size_id',
                'number',
            ]);
            $this->cartRepository->create($attribute);
            DB::commit();

            return redirect()->back()->with('message', trans('sites.carts.success_update'));
        } catch (Exception $ex) {
            Log::useDailyFiles(config('app.file_log'));
            Log::error($ex->getMessage());
            DB::rollback();

            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Update product in cart
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateCart(Request $request)
    {
        DB::beginTransaction();
        try {
            $this->cartRepository->updateCart($request->cartProductIds);
            DB::commit();

            return redirect()->back()->with('message', trans('sites.carts.success_update'));
        } catch (Exception $ex) {
            Log::useDailyFiles(config('app.file_log'));
            Log::error($ex->getMessage());
            DB::rollback();

            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
    /**
     * Ajax header of cart
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getNumberProduct(Request $request)
    {
        if (empty(session('hash'))) {
            session()->push('hash', $request->hash);
        }
        $cartProducts = $this->cartRepository->getProductInCart();
        $sum = empty($cartProducts) ? 0 : $cartProducts->sum("price");

        return view('sites.cart.header', [
            'number' => count($cartProducts),
            'price' => $sum,
        ]);
    }

    /**
     * Show my cart
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function myCart()
    {
        $cartProducts = $this->cartRepository->getProductInCart();
        $price = empty($cartProducts) ? 0 : $cartProducts->sum("price");

        // Add avatar attribute for cart_product model
        foreach ($cartProducts as $cartProduct) {
            $product = $cartProduct->storeProduct->product;
            $cartProduct['avatar'] = $this->productRepository->getAvatar($product);
        }

        return view('sites.cart.show', [
            'cartProducts' => $cartProducts,
            'price' => $price,
        ]);
    }

    /**
     * Remove product in cart
     * @param Request $request
     * @return boolean
     */
    public function removeProductInCart(Request $request)
    {
        return $this->cartRepository->removeProductInCart($request->id);
    }

    public function getCart()
    {
        $cartProducts = $this->cartRepository->getProductInCart();
        $price = empty($cartProducts) ? 0 : $cartProducts->sum("price");

        // Add avatar attribute for cart_product model
        foreach ($cartProducts as $cartProduct) {
            $product = $cartProduct->storeProduct->product;
            $cartProduct['avatar'] = $this->productRepository->getAvatar($product);
        }

        return view('sites.cart.ajax', [
            'cartProducts' => $cartProducts,
            'price' => $price,
        ]);
    }
}
