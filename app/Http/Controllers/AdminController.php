<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //change password
    public function changePasswordPage()
    {
        return view('admin.account.change');
    }

    //changed password
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

    public function viewAccountDetail()
    {
        return view('admin.account.detail');
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