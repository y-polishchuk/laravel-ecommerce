<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function all()
    {
        // $categories = DB::table('categories')
        //     ->join('users', 'categories.user_id', 'users.id')
        //     ->select('categories.*', 'users.name')
        //     ->latest()->paginate(5);
    
        $categories = Category::paginate(5);
        $trashCat = Category::onlyTrashed()->latest()->paginate(3);
        
        return view('admin.category.index', compact('categories', 'trashCat'));
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

        Category::insert([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now()
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

    public function edit($id)
    {
        $category = Category::find($id);
        // $category = DB::table('categories')->where('id', $id)->first();
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        // $update = Category::find($id)->update([
        //     'category_name' => $request->category_name,
        //     'user_id' => Auth::user()->id,
        // ]);
        $data = [];
        $data['category_name'] = $request->category_name;
        $data['user_id'] = Auth::user()->id;

        DB::table('categories')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'Category Is Updated Successfully!',
            'alert-type' => 'info',
        );

        return Redirect()->route('categories')->with($notification);
    }

    public function softDelete($id)
    {
        $delete = Category::find($id)->delete();

        $notification = array(
            'message' => 'Category Is SoftDeleted Successfully!',
            'alert-type' => 'info',
        );
        
        return Redirect()->back()->with($notification);
    }

    public function restore($id)
    {
        $delete = Category::withTrashed()->find($id)->restore();

        $notification = array(
            'message' => 'Category Is Restored Successfully!',
            'alert-type' => 'info',
        );
        
        return Redirect()->back()->with($notification);
    }

    public function permDelete($id)
    {
        $delete = Category::onlyTrashed()->find($id)->forceDelete();

        $notification = array(
            'message' => 'Category Is Deleted Permanently!',
            'alert-type' => 'warning',
        );
        
        return Redirect()->back()->with($notification);
    }
}
