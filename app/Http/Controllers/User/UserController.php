<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //home page
    public function homePage()
    {
        $pizzas = Product::orderBy('id', 'desc')->get();
        $categories = Category::get();
        return view('user.home', compact('categories', 'pizzas'));
    }

    //view detail
    public function viewAccountDetail()
    {
        return view('user.account.detail');
    }

    //edit detail
    public function editAccountDetail()
    {
        return view('user.account.edit');
    }

    //update detail
    public function updateAccountDetail($id, Request $request)
    {
        $this->accountValidationCheck($request);
        $data = $this->getData($request);

        if ($request->hasFile('image')) {
            $dbOldImage = User::select('image')->where('id', $id)->first();
            $dbOldImageName = $dbOldImage->image;

            if ($dbOldImageName != null) {
                Storage::delete('public/' . $dbOldImageName);
            }
            $imageName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public', $imageName);
            $data['image'] = $imageName;
        }
        User::where('id', $id)->update($data);
        return redirect()->route('user#accountDetail')->with(['updateSuccess' => '✔ Update Success.']);
    }

    //get account update data
    private function getData($request)
    {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'address' => $request->address,
        ];
    }
    //account validation check
    private function accountValidationCheck($request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'address' => 'required',
        ])->validate();
    }
}