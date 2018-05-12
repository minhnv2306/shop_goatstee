<?php

namespace App\Http\Controllers\Sites;

use App\Http\Requests\OrderRequest;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use App\Repositories\CartRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class OrderController extends Controller
{
    protected $cartRepository;
    protected $productRepository;
    protected $orderRepository;

    public function __construct(
        CartRepository $cartRepository,
        ProductRepository $productRepository,
        OrderRepository $orderRepository
    ) {
        $this->cartRepository = $cartRepository;
        $this->productRepository = $productRepository;
        $this->orderRepository = $orderRepository;
    }

    public function show()
    {
        $user = Auth::user();
        $cartProducts = $this->cartRepository->getProductInCart();
        $price = empty($cartProducts) ? 0 : $cartProducts->sum('price');

        // Add avatar attribute for cart_product model
        foreach ($cartProducts as $cartProduct) {
            $product = $cartProduct->storeProduct->product;
            $cartProduct['avatar'] = $this->productRepository->getAvatar($product);
        }

        $data = compact('user', 'price', 'cartProducts');

        return view('sites.order.show', $data);
    }

    public function store(OrderRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->only([
                'customer_name',
                'shipping_name',
                'shipping_address',
                'billing_name',
                'billing_address',
                'customer_email',
                'phone',
                'price',
            ]);
            if (Auth::check()) {
                $data['user_id'] = Auth::user()->id;
            }
            $data['status'] = Order::PENDDING_STATUS;
            if ($this->orderRepository->createOrder($data, $request->cartProductIds)) {
                DB::commit();

                return view('sites.order.success_add', [
                    'message' => trans('sites.order.success_add'),
                ]);
            } else {
                DB::rollback();

                return view('sites.order.success_add', [
                    'error' => trans('sites.order.not_enough'),
                ]);
            }
        } catch (Exception $ex) {
            Log::useDailyFiles(config('app.file_log'));
            Log::error($ex->getMessage());
            DB::rollback();

            return view('sites.order.success_add', [
                'error' => trans('sites.order.fail_add'),
            ]);
        }
    }

    public function getAllMyOrder()
    {
        $orders = $this->orderRepository->getAllOrderOfUser(Auth::user());
        foreach ($orders as $order) {
            $order['status'] = Order::getStatus($order->status);
        }

        $data = compact('orders');

        return view('sites.order.index', $data);
    }

    public function showOrder(Order $order)
    {
        $productOrders = $order->productOrders;
        $price = empty($productOrders) ? 0 : $productOrders->sum('price');

        $data = compact('productOrders', 'order', 'price');

        return view('sites.order.showOrder', $data);
    }
}
