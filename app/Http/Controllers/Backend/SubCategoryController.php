<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{

    public function SubCategoryView()
    {
        $category = Category::orderby('category_name_en', 'ASC')->get();
        $subcategory = SubCategory::latest()->get();
        return view('backend.category.subcategory_view', compact('subcategory', 'category'));
    }
    public function StoreSubCategory(Request $request)
    {
        $request->validate(
            [
                'category_id' => 'required',
                'subcategory_name_en' => 'required',
                'subcategory_name_hin' => 'required',


            ],
            [
                'category_id.required' => 'Please select any option',
                'subcategory_name_en.required' => 'Input Sub Category English Name',
                'subcategory_name_hin.required' => 'Input Sub Category Hindi Name',
            ]
        );
        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_hin' => $request->subcategory_name_hin,
            'subcategory_slug_en' => strtolower(str_replace('', '-', $request->subcategory_name_en)),
            'subcategory_slug_hin' => strtolower(str_replace('', '-', $request->subcategory_name_hin)),
        ]);
        $notification = array(
            'message' => 'SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function SubCategoryEdit($id)
    {
        $category = Category::orderby('category_name_en', 'ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return  view('backend.category.subcategory_edit', compact('subcategory', 'category'));
    }
    public function SubCategoryUpdate(Request $request)
    {
        $subcategory_id = $request->id;
        SubCategory::findOrFail($subcategory_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_hin' => $request->subcategory_name_hin,
            'subcategory_slug_en' => strtolower(str_replace('', '-', $request->subcategory_name_en)),
            'subcategory_slug_hin' => strtolower(str_replace('', '-', $request->subcategory_name_hin)),
        ]);
        $notification = array(
            'message' => 'SubCategory Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.subcategory')->with($notification);
    }
    public function SubCategoryDelete($id)
    {
        SubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'SubCategory Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
    // sub sub category 
    public function SubSubCategoryView()
    {
        $categories = Category::orderby('category_name_en', 'ASC')->get();
        $subsubcategory = SubSubCategory::latest()->get();
        return view('backend.category.subsubcategory_view', compact('categories', 'subsubcategory'));
    }
    public function GetsubCategory($category_id)
    {
        $subcat = SubCategory::where('category_id', $category_id)->orderBy('subcategory_name_en', 'ASC')->get();
        return json_decode($subcat);
    }
    public function SubStoreSubCategory(Request $request)
    {
        $request->validate(
            [
                'category_id' => 'required',
                'subcategory_id' => 'required',
                'subsubcategory_name_en' => 'required',
                'subsubcategory_name_hin' => 'required',


            ],
            [
                'category_id.required' => 'Please select any option',
                'subsubcategory_name_en.required' => 'Input Sub Sub Category English Name',
                'subsubcategory_name_hin.required' => 'Input Sub Sub Category Hindi Name',
            ]
        );
        SubSubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_hin' => $request->subsubcategory_name_hin,
            'subsubcategory_slug_en' => strtolower(str_replace('', '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_hin' => strtolower(str_replace('', '-', $request->subsubcategory_name_hin)),
        ]);
        $notification = array(
            'message' => 'Sub SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function SubSubCategoryEdit($id)
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategories = SubCategory::orderBy('subcategory_name_en', 'ASC')->get();
        $subsubcategories = SubSubCategory::findOrFail($id);
        return view('backend.category.sub_subcategory_edit', compact('categories', 'subcategories', 'subsubcategories'));
    }
    public function SubSubCategoryUpdate(Request $request)
    {
        $subsubcat_id = $request->id;
        SubSubCategory::findOrFail($subsubcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_hin' => $request->subsubcategory_name_hin,
            'subsubcategory_slug_en' => strtolower(str_replace('', '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_hin' => strtolower(str_replace('', '-', $request->subsubcategory_name_hin)),
        ]);
        $notification = array(
            'message' => 'Sub SubCategory Update Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('all.subsubcategory')->with($notification);
    }
    public function SubSubCategoryDelete($id)
    {
        SubSubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Sub SubCategory Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
    public function GetSubsubCategory($subcategory_id)
    {
        $subsubcat = SubSubCategory::where('subcategory_id', $subcategory_id)->orderBy('subsubcategory_name_en', 'ASC')->get();
        return json_decode($subsubcat);
    }
}
