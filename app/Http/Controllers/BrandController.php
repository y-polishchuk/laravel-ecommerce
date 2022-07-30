<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Multipic;
use Illuminate\Support\Carbon;
use Image;
use Auth;

class BrandController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function all()
    {
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index', compact('brands'));
    }

    public function addBrand(Request $request)
    {
        $validated = $request->validate([
            'brand_name' => 'required|unique:brands|min:4',
            'brand_image' => 'required|mimes:jpg,jpeg,png',
        ],
        [
            'brand_name.required' => 'Please, Input Brand Name.',
            'brand_name.min' => 'Brand Name Must Be Longer Than 4 Chars.',
        ]);

        $brand_image = $request->file('brand_image');
        
        // $name_gen = hexdec(uniqid());
        // $img_ext = strtolower($brand_image->getClientOriginalExtension());
        // $img_name = $name_gen.'.'.$img_ext;
        // $up_location = 'image/brand/';
        // $last_img = $up_location.$img_name;
        // $brand_image->move($up_location,$img_name);

        $name_gen = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
        $last_img = 'image/brand/'.$name_gen;
        Image::make($brand_image)->fit(400,400)->save($last_img);

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->back()->with('success', 'Brand Inserted Successfully!');
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'brand_name' => 'required|min:4'
        ],
        [
            'brand_name.required' => 'Please, Input Brand Name.',
            'brand_name.min' => 'Brand Name Must Be Longer Than 4 Chars.',
        ]);

        $old_image = $request->old_image;
        $brand_image = $request->file('brand_image');

        if($brand_image) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($brand_image->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'image/brand/';
            $last_img = $up_location.$img_name;
            $brand_image->move($up_location,$img_name);
    
            unlink($old_image);
    
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'brand_image' => $last_img,
                'created_at' => Carbon::now()
            ]);
    
            return Redirect()->back()->with('success', 'Brand Updated Successfully!');
        } else {
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'created_at' => Carbon::now()
            ]);
    
            return Redirect()->back()->with('success', 'Brand Updated Successfully!');
        }
        
    }

    public function delete($id)
    {
        $brand = Brand::find($id);
        $old_image = $brand->brand_image;
        unlink($old_image);
        $delete = Brand::find($id)->delete();
        
        return Redirect()->back()->with('success', 'Brand is Deleted Successfully!');
    }

    // This is for Multi Image all method

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
        Image::make($multi_img)->fit(400,400)->save($last_img);

        Multipic::insert([
            'image' => $last_img,
            'created_at' => Carbon::now()
        ]);
        }// end of the foreach

        return Redirect()->back()->with('success', 'Images are Inserted Successfully!');
    }

    public function logout()
    {
        Auth::logout();
        return Redirect()->route('login');
    }
}
