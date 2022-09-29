<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

    //viewAccountDetail
    public function viewAccountDetail()
    {
        return view('admin.account.detail');
    }

    //editAccountDetail
    public function editAccountDetail()
    {
        return view('admin.account.edit');
    }

    //updateAccountDetail
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
        return redirect()->route('accountDetail')->with(['updateSuccess' => '✔ Update Success.']);
    }

    //view admin list
    public function viewAdminList()
    {
        $admins = User::where('role', 'admin')->paginate(4);
        $admins->appends(request()->all());
        return view('admin.account.list', compact('admins'));
    }

    //delete admin list
    public function deleteAdminList($id)
    {
        $image = User::select('image')->where('id', $id)->first();
        $imagName = $image->image;
        if ($imagName != 'null') {
            Storage::delete('public/' . $imagName);
        }
        User::where('id', $id)->delete();
        return redirect()->route('adminLists#view')->with(['deleteAdminSuccess' => 'Delete Success!']);
    }


    //changeRole
    public function changeRole(Request $request)
    {
        User::where('id', $request->id)->update(
            ['role' => $request->role]
        );
        $response = [
            'message' => 'change success',
            'status' => 'true'
        ];
        return response()->json($response, 200);
    }

    //view user list
    public function viewUserList()
    {
        $users = User::where('role', 'user')->paginate(4);
        return view('admin.account.userList', compact('users'));
    }

    //userChangeRole
    public function userChangeRole(Request $request)
    {
        User::where('id', $request->id)->update(
            ['role' => $request->role]
        );
        $response = [
            'message' => 'change success',
            'status' => 'true'
        ];
        return response()->json($response, 200);
    }

    //userSuspend
    public function userSuspend(Request $request)
    {
        User::where('id', $request->id)->update(
            ['suspend' => $request->suspend]
        );
        $response = [
            'message' => 'success',
            'status' => 'true'
        ];
        return response()->json($response, 200);
    }

    //user contacts
    public function userContact()
    {
        $data = Contact::orderBy('id', 'desc')->paginate(5);
        return view('admin.contact.list', compact('data'));
    }

    //user contact delete
    public function userContactDelete($id)
    {
        Contact::where('id', $id)->delete();
        return redirect()->route('userContact#list')->with(['deleteUserContact' => 'Delete Success!']);
    }

    //user contact view
    public function userContactView($id)
    {
        $data = Contact::where('id', $id)->first();
        return view('admin.contact.view', compact('data'));
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