<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        return view('admin.order.index');
    }

    public function show(Order $order)
    {
        $productOrders = $order->productOrders;
        $price = empty($productOrders) ? 0 : $productOrders->sum('price');
        $status = Order::getStatus($order->status);
        $arrayStatus = Order::getArrayStatus();

        $data = compact('order', 'productOrders', 'price', 'status', 'arrayStatus');

        return view('admin.order.show', $data);
    }

    public function ajaxServerDataTable()
    {
        $attribute = [
            'id',
            'billing_name',
            'shipping_name',
            'billing_address',
            'shipping_address',
            'price',
            'created_at',
            'status',
        ];
        $orders = $this->orderRepository->getAll($attribute);

        return DataTables::of($orders)
            ->editColumn('status', function ($order) {
                return Order::getStatus($order->status);
            })
            ->editColumn('price', function ($order) {
                return number_format($order->price);
            })
            ->addColumn('action', function ($order) {
                return view('admin.order.action', ['order' => $order])->render();
            })
            ->rawColumns([
                'action',
                'status',
            ])
            ->make();
    }

    public function update(Order $order, Request $request)
    {
        try {
            $data = $request->only([
                'note',
                'status',
            ]);
            $this->orderRepository->update($order, $data);

            return redirect()->back()->with('message', trans('sites.order.success_update'));
        } catch (Exception $ex) {
            Log::useDailyFiles(config('app.file_log'));
            Log::error($ex->getMessage());

            return redirect()->back()->with('error', trans('sites.order.fail_update'));
        }
    }
}
