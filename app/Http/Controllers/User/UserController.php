<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    //home page
    public function homePage(Request $request)
    {
        $pizzas = Product::orderBy('created_at', 'desc')->paginate(6);
        $categories = Category::get();
        $cart = Cart::where('user_id', Auth::user()->id)->get();
        $history = Order::where('user_id', Auth::user()->id)->get();

        if ($request->ajax()) {
            $pizzas = Product::orderBy('created_at', 'desc')->paginate(6);
            return view('user.home_data', compact('pizzas'))->render();
        }
        return view('user.home', compact('categories', 'pizzas', 'cart', 'history'));
    }

    //filter category
    public function filter($categoryId)
    {
        $pizzas = Product::where('category_id', $categoryId)->orderBy('id', 'desc')->paginate(6);
        $categories = Category::get();
        $cart = Cart::where('user_id', Auth::user()->id)->get();
        $history = Order::where('user_id', Auth::user()->id)->get();
        return view('user.home', compact('categories', 'pizzas', 'cart', 'history'));
    }

    //change password page
    public function changePasswordPage()
    {
        $cart = Cart::where('user_id', Auth::user()->id)->get();
        return view('user.account.change', compact('cart'));
    }

    //change password
    public function changePassword(Request $request)
    {
        $this->passwordValidationCheck($request);
        $user = User::select('password')->where('id', Auth::user()->id)->first();
        $oldDbPassword = $user->password;
        if (Hash::check($request->oldPassword, $oldDbPassword)) {
            $newPassword = [
                'password' => Hash::make($request->newPassword)
            ];
            User::where('id', Auth::user()->id)->update($newPassword);
            Auth::logout();
            return redirect()->route('auth#loginPage')->with(['successChangePassword' => '✔ Password have Changed Successfully.Login Now!']);
        }
        return back()->with(['notMatch' => '❌ The old password do not match.Try Again!']);
    }

    //view detail
    public function viewAccountDetail()
    {
        $cart = Cart::where('user_id', Auth::user()->id)->get();
        return view('user.account.detail', compact('cart'));
    }

    //edit detail
    public function editAccountDetail()
    {
        $cart = Cart::where('user_id', Auth::user()->id)->get();
        return view('user.account.edit', compact('cart'));
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
    //password validation check
    private function passwordValidationCheck($request)
    {
        Validator::make($request->all(), [
            'oldPassword' => 'required|min:6',
            'newPassword' => 'required|min:6',
            'confirmPassword' => 'required|min:6|same:newPassword',
        ])->validate();
    }
}