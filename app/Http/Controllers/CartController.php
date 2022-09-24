<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //get orderList
    public function orderList()
    {
        $list = Cart::select('carts.*', 'products.name', 'products.price', 'products.image')
            ->leftJoin('products', 'products.id', 'carts.product_id')
            ->where('carts.user_id', Auth::user()->id)
            ->get();
        $cart = Cart::where('user_id', Auth::user()->id)->get();
        $totalPrice = 0;
        foreach ($list as $l) {
            $totalPrice += $l->price * $l->qty;
        }
        return view('user.main.cart', compact('list', 'totalPrice', 'cart'));
    }

    //get history list
    public function historyList()
    {
        $historyLists = Order::where('user_id', Auth::user()->id)->get();
        $cart = Cart::where('user_id', Auth::user()->id)->get();
        return view('user.main.history', compact('historyLists', 'cart'));
    }
}