<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //viewOrderList
    public function viewOrderList()
    {
        $orderList = Order::select('orders.*', 'users.name as user_name')
            ->leftJoin('users', 'users.id', 'orders.user_id')
            ->get();
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
}