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
            return redirect()->route('login')->with('success', 'Password Is Changed Successfully.');
        } else {
            return redirect()->back()->with('error', 'Current Password Is Invalid.');
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
        Image::make($user_image)->save('storage/'.$last_img);

        if($old_image) {
            unlink('storage/'.$old_image);
        }
        $user->profile_photo_path = $last_img; // here laravel adds automatically 'storage/' to display image at avatar
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('success', 'User Profile Is Updated Successfully!');
       } else {
        return redirect()->back();
       }
    }
}
