<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Carbon;
use Image;
use App\DataTables\BrandsDataTable;
use Yajra\DataTables\DataTables;

class BrandController extends Controller
{
    public function adminBrand(BrandsDataTable $dataTable)
    {
        return $dataTable->render('admin.brand.index');
    }

    public function dataBrands(Request $request)
    {
        $brands = Brand::get();
 
        return DataTables::of($brands)
        ->editColumn('brand_image', function ($brand) {
            return '<img src="'. asset($brand->brand_image) .'" height="60px" />';
        })
        ->editColumn('created_at', function ($brand) {
            return $brand->created_at->diffForHumans();
        })
        ->addColumn('action', function ($brand) {
            return view('admin.brand.action', ['brand' => $brand]);
        })
        ->rawColumns(['brand_image', 'action'])
        ->toJson();
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

    public function edit(Brand $brand)
    {   
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
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

    public function delete(Brand $brand)
    {
        $old_image = $brand->brand_image;
        if(file_exists($old_image)) unlink($old_image);
        $brand->delete();

        $notification = array(
            'message' => 'Brand Is Deleted Successfully!',
            'alert-type' => 'warning',
        );
        
        return Redirect()->back()->with($notification);
    }
}
