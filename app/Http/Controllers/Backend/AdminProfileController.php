<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Auth;
use App\Http\Requests\UpdateAdminProfileRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function AdminProfile()
    {
        $id = Auth::user()->id;
		$adminData = Admin::find($id);
        return view('admin.admin_profile_view',compact('adminData'));
    }

    public function AdminProfileEdit()
    {
        $id = Auth::user()->id;
		$editData = Admin::find($id);
        return view('admin.admin_profile_edit',compact('editData'));
    }

    public function AdminProfileStore(UpdateAdminProfileRequest $request)
    {
        try {
            $adminId = auth()->id();
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'phone'=>$request->phone,
                'address'=>$request->address,
            ];
            if ($request->file('profile_photo_path')) {
                $file = $request->file('profile_photo_path');
                @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
                $filename =  Str::uuid()->toString() . '.' .$file->getClientOriginalName();
                $file->move(public_path('upload/admin_images'),$filename);
                $data['profile_photo_path'] = $filename;
            }
            Admin::where('id', $adminId)->update($data);
            $notification = [
                'message' => 'Admin Profile Updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('admin.profile')->with($notification);
        } catch (\Exception $e) {
            $notification = [
                'message' => 'Admin Profile Update Failed',
                'alert-type' => 'error'
            ];
            $errorMessage = $request->errors()->first();
            if ($errorMessage) {
                $notification['message'] = $errorMessage;
            }
            return redirect()->route('admin.profile.edit')->with($notification);
        }
        }

    public function AdminChangePassword()
    {
        return view('admin.admin_change_password');
    }

   
    public function AdminUpdateChangePassword(Request $request)
    {
    try {
        $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $admin = Admin::find(Auth::id());
            $admin->update(['password' => Hash::make($request->password)]);
            Auth::logout();
            return redirect()->route('admin.logout');
        } else {
            $errorMessage = 'Invalid old password. Please try again.';
            return redirect()->back()->withErrors(['password_change' => $errorMessage]);
        }
    } catch (\Exception $e) {
        Log::error($e->getMessage());
        $errorMessage = 'An error occurred while updating the password. Please try again.';
        return redirect()->back()->withErrors(['password_change' => $errorMessage]);
    }
    }


    public function AllUsers(){
		$users = User::latest()->get();
		return view('backend.user.all_user',compact('users'));
	}

  
}