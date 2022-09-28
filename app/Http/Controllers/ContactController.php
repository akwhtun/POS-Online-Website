<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    //contactPage
    public function contactPage()
    {
        $cart = Cart::where('user_id', Auth::user()->id)->get();
        return view('user.contact.contact', compact('cart'));
    }

    //contactSuccess
    public function contactSuccess(Request $request)
    {
        $cart = Cart::where('user_id', Auth::user()->id)->get();
        $this->getValidationCheck($request);
        $data = $this->getData($request);

        Contact::create($data);
        return view('user.contact.contactSuccess', compact('cart'));
    }

    //get data
    public function getData($request)
    {
        return [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];
    }

    //validation
    private function getValidationCheck($request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required|min:15',
        ])->validate();
    }
}