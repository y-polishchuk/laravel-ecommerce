<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use App\DataTables\CategoriesDataTable;
use App\DataTables\CategoriesTrashedDataTable;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{

    public function adminCategories(CategoriesDataTable $dataTable)
    {
        return $dataTable->render('admin.category.index');
    }

    public function dataCategories(Request $request)
    {
        $categories = Category::get();
 
        return DataTables::of($categories)
        ->editColumn('created_at', function ($category) {
            return $category->created_at->diffForHumans();
        })
        ->addColumn('action', function ($category) {
            return view('admin.category.action', ['category' => $category]);
        })
        ->rawColumns(['action'])
        ->toJson();
    }

    public function adminCategoriesTrashed(CategoriesTrashedDataTable $dataTable)
    {
        return $dataTable->render('admin.category.trashed.trashed');
    }

    public function dataCategoriesTrashed(Request $request)
    {
        $categories = Category::onlyTrashed()->latest();
 
        return DataTables::of($categories)
        ->editColumn('created_at', function ($category) {
            return $category->created_at->diffForHumans();
        })
        ->editColumn('deleted_at', function ($category) {
            return $category->deleted_at->diffForHumans();
        })
        ->addColumn('action', function ($category) {
            return view('admin.category.trashed.action', ['category' => $category]);
        })
        ->rawColumns(['action'])
        ->toJson();
    }

    public function add(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ],
        [
            'category_name.required' => 'Please, Input Category Name.',
            'category_name.max' => 'Category Name Less Than 255Chars.',
        ]);

        Category::create([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id
        ]);

        // $category = new Category();
        // $category->category_name = $request->category_name;
        // $category->user_id = Auth::user()->id;
        // $category->save();

        // $data = array();
        // $data['category_name'] = $request->category_name;
        // $data['user_id'] = Auth::user()->id;
        // DB::table('categories')->insert($data);

        $notification = array(
            'message' => 'Category Is Inserted Successfully!',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $category->update([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
        ]);

        $notification = array(
            'message' => 'Category Is Updated Successfully!',
            'alert-type' => 'info',
        );

        return Redirect()->route('categories')->with($notification);
    }

    public function softDelete(Category $category)
    {
        $category->delete();

        $notification = array(
            'message' => 'Category Is SoftDeleted Successfully!',
            'alert-type' => 'info',
        );
        
        return Redirect()->back()->with($notification);
    }

    public function restore($id)
    {
        Category::withTrashed()->find($id)->restore();

        $notification = array(
            'message' => 'Category Is Restored Successfully!',
            'alert-type' => 'info',
        );
        
        return Redirect()->back()->with($notification);
    }

    public function permDelete($id)
    {
        Category::withTrashed()->find($id)->forceDelete();

        $notification = array(
            'message' => 'Category Is Deleted Permanently!',
            'alert-type' => 'warning',
        );
        
        return Redirect()->back()->with($notification);
    }
}