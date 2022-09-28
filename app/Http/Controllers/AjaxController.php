<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderList;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    //newestList
    public function getList(Request $request)
    {
        if ($request->status == 'desc') {
            $list = Product::orderBy('id', 'desc')->get();
            return $list;
        }
        if ($request->status == 'asc') {
            $list = Product::orderBy('id', 'asc')->get();
            return $list;
        }
    }

    //order pizza
    public function orderPizza(Request $request)
    {
        $data = $this->getData($request);
        Cart::create($data);
        $response = [
            'message' => 'add to cart',
            'status' => 'success'
        ];
        return response()->json($response, 200);
    }

    //order item list
    public function orderItemList(Request $request)
    {
        $totalPrice = 0;
        foreach ($request->all() as $item) {
            $data = OrderList::create($item);
            $totalPrice += $data->total;
        }

        Cart::where('user_id', Auth::user()->id)->delete();

        Order::create([
            'user_id' => Auth::user()->id,
            'order_code' => $data->order_code,
            'total_price' => $totalPrice + 3000,
        ]);

        $response = [
            'message' => 'order success',
            'status' => 'true'
        ];
        return response()->json($response, 200);
    }


    //orderSuccess
    public function orderSuccess()
    {
        $cart = Cart::where('user_id', Auth::user()->id)->get();
        return view('user.main.orderSuccess', compact('cart'));
    }

    //clearCart
    public function clearCart()
    {
        Cart::where('user_id', Auth::user()->id)->delete();
        $response = [
            'message' => 'clear success',
            'status' => 'true'
        ];
        return response()->json($response, 200);
    }

    //listRemove
    public function listRemove(Request $request)
    {
        Cart::where('id', $request->id)->delete();
        $response = [
            'message' => 'clear success',
            'status' => 'true'
        ];
        return response()->json($response, 200);
    }

    //increaseViewCount
    public function increaseViewCount(Request $request)
    {
        $product = Product::where('id', $request->productId)->first();

        $viewCount = [
            'view_count' => $product->view_count + 1
        ];
        Product::where('id', $request->productId)->update($viewCount);
    }

    //get order pizza
    private function getData($request)
    {
        return [
            'user_id' => $request->userId,
            'product_id' => $request->pizzaId,
            'qty' => $request->orderCount,
        ];
    }
}