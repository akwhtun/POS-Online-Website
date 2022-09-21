<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //pizza list
    public function list()
    {
        $products = Product::select('products.*', 'categories.name as category_name')
            ->leftJoin('categories', 'products.category_id', 'categories.id')
            ->when(request('searchKey'), function ($query) {
                $query->where('products.name', 'like', '%' . request('searchKey') . '%');
            })->orderBy('products.id', 'desc')->paginate(3);
        // $products->appends(request()->all());
        return view('admin.product.list', compact('products'));
    }

    //pizza add
    public function add()
    {
        $categories = Category::get();
        return view('admin.product.add', compact('categories'));
    }

    //pizza create
    public function create(Request $request)
    {
        $this->pizzaValidationCheck($request, "create");
        $data = $this->getPizzaData($request);

        $pizzaPhoto = uniqid() . $request->file('pizzaPhoto')->getClientOriginalName();
        $request->file('pizzaPhoto')->storeAs('public/pizza', $pizzaPhoto);
        $data['image'] = $pizzaPhoto;
        Product::create($data);
        return redirect()->route('pizza#list')->with(['pizzaCreateSuccess' => 'Pizza Created']);
    }

    //pizza delete
    public function delete($id)
    {
        $image = Product::select('image')->where('id', $id)->first();
        $imagName = $image->image;
        Storage::delete('public/pizza/' . $imagName);
        Product::where('id', $id)->delete();
        return redirect()->route('pizza#list')->with(['pizzaDeleteSuccess' => 'Delete Success!']);
    }

    //pizza view
    public function view($id)
    {
        $product = Product::select('products.*', 'categories.name as category_name')
            ->leftJoin('categories', 'products.category_id', 'categories.id')
            ->where('products.id', $id)->first();
        return view('admin.product.view', compact('product'));
    }

    //pizza edit
    public function edit($id)
    {
        $categories = Category::get();
        $product = Product::where('id', $id)->first();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    //pizza update
    public function update(Request $request)
    {

        $updateId = $request->productId;
        $this->pizzaValidationCheck($request, "update");
        $updateData = $this->getPizzaData($request);
        if ($request->hasFile('pizzaPhoto')) {
            $oldDbPhoto = Product::select('image')->where('id', $updateId)->first();
            $oldDbPhotoName = $oldDbPhoto->image;
            Storage::delete('public/pizza/' . $oldDbPhotoName);

            $photoName = uniqid() . $request->file('pizzaPhoto')->getClientOriginalName();
            $request->file('pizzaPhoto')->storeAs('public/pizza', $photoName);
            $updateData['image'] = $photoName;
        }
        Product::where('id', $updateId)->update($updateData);
        return redirect()->route('pizza#list')->with(['pizzaUpdateSuccess' => 'Update Success!']);
    }

    //pizza detail
    public function viewDetail($pizzaId)
    {
        $pizza = Product::where('id', $pizzaId)->first();
        $pizzasList = Product::get();
        return view('user.main.detail', compact('pizza', 'pizzasList'));
    }

    //get data
    private function getPizzaData($request)
    {
        return [
            'category_id' => $request->pizzaCategory,
            'name' => $request->pizzaName,
            'description' => $request->pizzaDescription,
            'waiting_time' => $request->pizzaWaitingTime,
            'price' => $request->pizzaPrice,
        ];
    }

    //pizza validation check
    private function pizzaValidationCheck($request, $action)
    {

        $validationData = [
            'pizzaName' => 'required|min:5|unique:products,name,' . $request->productId,
            'pizzaDescription' => 'required|min:15',
            'pizzaCategory' => 'required',
            'pizzaWaitingTime' => 'required',
            'pizzaPrice' => 'required',
        ];

        $validationData['pizzaPhoto'] = $action == "create" ? 'required|mimes:jpg,png,jpeg,webp|file' : 'mimes:jpg,png,jpeg,webp|file';

        Validator::make($request->all(), $validationData)->validate();
    }
}