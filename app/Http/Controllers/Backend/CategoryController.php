<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Faker\Extension\Extension;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function createCategory()
    {
        if (Auth::user()) {
            if (Auth::user()->role == 1) {
                return view('backend.admin.category.create');
            }
        }
    }

    public function storeCategory(Request $request)
    {
        if (Auth::user()) {
            if (Auth::user()->role == 1) {
                $category = new Category();

                $category->name = $request->name;
                $category->slug = Str::slug($request->name);

                if (isset($request->image)) {
                    $imageName = rand() . $category->slug . '.' . $request->image->extension();
                    $request->image->move('backend/images/category/', $imageName);
                    $category->image = $imageName; // storing image name on database.
                }
                $category->save();
                return redirect()->back();
            }
        }
    }

    public function listCategory()
    {
        if (Auth::user()) {
            if (Auth::user()->role == 1) {
                $categories = Category::get();
                return view('backend.admin.category.list', compact('categories'));
            }
        }
    }

    public function deleteCategory($id)
    {
        if (Auth::user()) {
            if (Auth::user()->role == 1) {
                $category = Category::find($id);
                if ($category->image && file_exists('backend/images/category/' . $category->image)) {
                    unlink('backend/images/category/' . $category->image);
                }
                $category->delete();
                return redirect()->back();
            }
        }
    }
    
    public function editCategory($id)
    {
        if (Auth::user()) {
            if (Auth::user()->role == 1) {
                $category = Category::find($id);
                // dd($category);
                return view ('backend.admin.category.edit', compact('category'));
            }
        }
    }

    public function updateCategory (Request $request, $id)
    {
        if(Auth::user())
        {
            if(Auth::user()->role == 1)
            {
                $category = Category::find($id);

                $category->name = $request->name;
                $category->slug = Str::slug($request->name);

                if(isset($request->image)){
                    if($request->image && file_exists('backend/images/category/'.$category->image)){
                        unlink('backend/images/category/'.$category->image);
                    }
                    $imageName = rand().$category->slug.'.'.$request->image->extension();
                    $request->image->move('backend/images/category/',$imageName);
                    $category->image = $imageName;
                }
                $category->save();
                toastr()->success('Operation completed successfully.');
                return redirect('/admin/category/list');
            }
        }
    }
}
