<?php

namespace App\Http\Controllers;

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
}