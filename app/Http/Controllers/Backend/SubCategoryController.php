<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    public function listSubCategory()
    {
        $subCategory = SubCategory::with('category')->get();
        return view ('backend.admin.subcategory.list', compact('subCategory'));
    }

    public function createSubCategory()
    {
        $categories = Category::get();
        return view ('backend.admin.subcategory.create' , compact('categories'));
    }

    public function storeSubCategory(Request $request){
        if(Auth::user()){
            if(Auth::user()->role == 1){
                $subcategory = new SubCategory();
                
                $subcategory->cat_id = $request->cat_id;
                $subcategory->name = $request->name;
                $subcategory->slug = Str::slug($request->name);

                $subcategory->save();
                return redirect('/admin/sub-category/list');
            }
        }
    }

    public function editSubCategory($id){
        if(Auth::user()){
            if(Auth::user()->role == 1){
                $subCategory = SubCategory::find($id);
                $categories = Category::get();
                return view ('backend.admin.subcategory.edit', compact('subCategory', 'categories'));
            }
        }
    }

    public function updateSubCategory (Request $request, $id){
        if(Auth::user()){
            if(Auth::user()->role == 1){
                $subCategory = SubCategory::find($id);

                $subCategory->cat_id = $request->cat_id;
                $subCategory->name = $request->name;
                $subCategory->slug = Str::slug($request->name);

                $subCategory->save();
                toastr()->success('Updated Successfully.');
                return redirect()->back();
            }
        }
    }

    public function deleteSubCategory($id){
        if(Auth::user()){
            if(Auth::user()->role == 1){
                $subCategory = SubCategory::find($id);
                $subCategory->delete();
                toastr()->success('Deleted Successfully.');
                return redirect()->back();
            }
        }
    }
}
