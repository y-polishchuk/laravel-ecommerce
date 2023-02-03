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

        $name_gen = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
        $last_img = 'image/brand/'.$name_gen;
        Image::make($brand_image)->resizeCanvas(0, 0,'center', true)->save($last_img);   // Here I deleted resize(400,400)

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Brand Is Inserted Successfully!',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
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

        $brand = Brand::find($id);
        $old_image = $request->old_image;
        $brand_image = $request->file('brand_image');

        if($brand_image) {
            $img_name = hexdec(uniqid()).'.'.strtolower($brand_image->getClientOriginalExtension());
            $path = 'image/brand/'.$img_name;
            Image::make($brand_image->getRealPath())->resizeCanvas(0, 0,'center', true)->save($path);
            $brand->brand_image = $path;
            $brand->save();

            if(file_exists($old_image)) unlink($old_image);
        }
        $brand->update($request->except('brand_image'));

        $notification = array(
            'message' => 'Brand Is Updated Successfully!',
            'alert-type' => 'info',
        );
    
        return Redirect()->back()->with($notification);
        
    }

    public function delete($id)
    {
        $brand = Brand::find($id);
        $old_image = $brand->brand_image;
        if(file_exists($old_image)) unlink($old_image);
        $delete = Brand::find($id)->delete();

        $notification = array(
            'message' => 'Brand Is Deleted Successfully!',
            'alert-type' => 'warning',
        );
        
        return Redirect()->back()->with($notification);
    }
}
