<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //login page
    public function loginPage()
    {
        return view('login');
    }

    //register page
    public function registerPage()
    {
        return view('register');
    }

    //dashboard
    public function dashboard()
    {
        if (Auth::user()->role == 'admin') {
            return redirect()->route('category#list');
        } else {
            return redirect()->route('user#home');
        }
    }
}