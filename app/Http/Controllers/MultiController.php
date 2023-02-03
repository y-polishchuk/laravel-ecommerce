<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Multipic;
use Illuminate\Support\Carbon;
use Image;
use Auth;

class MultiController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function multipic()
    {
        $images = Multipic::all();
        return view('admin.multipic.index', compact('images'));
    }

    public function addImg(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required',
        ]);

        $images = $request->file('image');

        foreach($images as $multi_img) {

        $name_gen = hexdec(uniqid()).'.'.$multi_img->getClientOriginalExtension();
        $last_img = 'image/multi/'.$name_gen;
        Image::make($multi_img)->resizeCanvas(0, 0,'center', true)->save($last_img); // Here I deleted fit(400,400)

        Multipic::insert([
            'image' => $last_img,
            'created_at' => Carbon::now()
        ]);
        }// end of the foreach

        $notification = array(
            'message' => 'Images are Inserted Successfully!',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }

    public function deleteMulti($id)
    {
        $multipic = Multipic::find($id);
        $old_image = $multipic->image;
        if(file_exists($old_image)) unlink($old_image);
        $delete = Multipic::find($id)->delete();

        $notification = array(
            'message' => 'Image Is Deleted Successfully!',
            'alert-type' => 'warning',
        );
        
        return Redirect()->back()->with($notification);
    }

    public function logout()
    {
        Auth::logout();
        return Redirect()->route('login');
    }
}
