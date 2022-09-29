<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderList;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //viewOrderList
    public function viewOrderList()
    {
        $orderList = Order::select('orders.*', 'users.name as user_name')
            ->leftJoin('users', 'users.id', 'orders.user_id')
            ->orderBy('id', 'desc')->paginate(5);
        return view('admin.orderList.list', compact('orderList'));
    }

    //chooseOrderStatus
    public function chooseOrderStatus(Request $request)
    {
        // logger($request->status);
        $lists = Order::select('orders.*', 'users.name as user_name')
            ->leftJoin('users', 'users.id', 'orders.user_id')
            ->orderBy('orders.id', 'desc');

        if ($request->status == null) {
            $lists = $lists->get();
        } else {
            $lists = $lists->where('orders.status', $request->status)->get();
        }

        return response()->json($lists, 200);
    }

    //changeOrderStatus
    public function changeOrderStatus(Request $request)
    {
        $orderId = $request->orderId;
        $status = $request->changeStatus;
        Order::where('id', $orderId)->update([
            'status' => $status
        ]);

        $response = [
            'message' => 'change success',
            'status' => 'true'
        ];
        return response()->json($response, 200);
    }

    //viewOrderData
    public function viewOrderData($code)
    {
        $order = Order::select('total_price', 'status')->where('order_code', $code)->get();
        $data = OrderList::select('order_lists.*', 'users.name as user_name', 'users.image as user_image', 'users.gender as user_gender', 'products.name as product_name', 'products.image as product_image')
            ->leftJoin('users', 'users.id', 'order_lists.user_id')
            ->leftJoin('products', 'products.id', 'order_lists.product_id')
            ->where('order_code', $code)->get();
        // dd($order->toArray());
        return view('admin.orderList.data', compact('data', 'order'));
    }
}