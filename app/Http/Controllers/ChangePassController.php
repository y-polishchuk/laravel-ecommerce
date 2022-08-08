<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Image;
use Illuminate\Support\Facades\Hash;

class ChangePassController extends Controller
{
    public function changePass()
    {
        return view('admin.body.change_pass');
    }

    public function updatePass(Request $request)
    {
        $validateData = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPass = Auth::user()->password;
        if(Hash::check($request->old_password, $hashedPass)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            $notification = array(
                'message' => 'Password Is Changed Successfully!',
                'alert-type' => 'success',
            );

            return redirect()->route('login')->with($notification);
        } else {
            $notification = array(
                'message' => 'Current Password Is Invalid.',
                'alert-type' => 'error',
            );

            return redirect()->back()->with($notification);
        }
    }

    public function profileUpdate()
    {
        if(Auth::user()) {
            $user = User::find(Auth::user()->id);
            if($user) {
                return view('admin.body.update_profile', compact('user'));
            }
        }
    }

    public function userUpdateProfile(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $user = User::find(Auth::user()->id);
       
        if($user) {
        $old_image = $request->old_image;
        $user_image = $request->file('user_image');

        if($user_image) {
        $name_gen = hexdec(uniqid()).'.'.$user_image->getClientOriginalExtension();
        $last_img = 'profile-photos/'.$name_gen;
        Image::make($user_image)->fit(400,400)->save('user/'.$last_img);

        if($old_image) {
            unlink('user/'.$old_image);
        }
        $user->profile_photo_path = $last_img; 
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $notification = array(
            'message' => 'User Profile Is Updated Successfully!',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
       } else {
        return redirect()->back();
       }
    }
}
