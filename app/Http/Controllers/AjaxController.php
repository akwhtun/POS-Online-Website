<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

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
            $list = Product::orderBy('id')->get();
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