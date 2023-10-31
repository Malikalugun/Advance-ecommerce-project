<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Product;
use App\Models\Brand;
use App\Http\Controllers\Controller;
use App\Models\MultiImg;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;


class ProductController extends Controller
{
    public function ProductsAdd()
    {
        $categories = Category::latest()->get();
        $brand = Brand::latest()->get();
        return view('backend.product.product_add', compact('categories', 'brand'));
    }
    public function ProductStore(Request $request)
    {
        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/products/thumbnail/' . $name_gen);
        $save_url = 'upload/products/thumbnail/' . $name_gen;
        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_hin' => $request->product_name_hin,
            'product_slug_en' => strtolower(str_replace('', '-', $request->product_name_en)),
            'product_slug_hin' => strtolower(str_replace('', '-', $request->product_name_hin)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_hin' => $request->product_tags_hin,
            'product_size_en' => $request->product_size_en,
            'product_size_hin' => $request->product_size_hin,
            'product_color_en' => $request->product_color_en,
            'product_color_hin' => $request->product_color_hin,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_hin' => $request->short_descp_hin,
            'long_descp_en' => $request->short_descp_en,
            'long_descp_hin' => $request->short_descp_hin,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'product_thumbnail' => $save_url,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);
        // multi image upload start
        $images = $request->file('multi_img');
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/products/multi-image/' . $make_name);
            $uploadPath = 'upload/products/multi-image/' . $make_name;
            MultiImg::insert([
                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),
            ]);
        }
        $notification = array(
            'message' => 'Producted Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('manage.products')->with($notification);


        // end multi image start
    }
    public function ManageProducts()
    {
        $products = Product::latest()->get();
        return view('backend.product.products_view', compact('products'));
    }
    public function ProductsEdit($id)
    {
        $multi_img = MultiImg::where('product_id', $id)->get();
        $brand = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();
        $products = Product::findOrFail($id);
        return view('backend.product.product_edit', compact('brand', 'categories', 'subcategories', 'subsubcategories', 'products', 'multi_img'));
    }
    public function ProductsUpdate(Request $request)
    {
        $product_id = $request->id;
        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_hin' => $request->product_name_hin,
            'product_slug_en' => strtolower(str_replace('', '-', $request->product_name_en)),
            'product_slug_hin' => strtolower(str_replace('', '-', $request->product_name_hin)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_hin' => $request->product_tags_hin,
            'product_size_en' => $request->product_size_en,
            'product_size_hin' => $request->product_size_hin,
            'product_color_en' => $request->product_color_en,
            'product_color_hin' => $request->product_color_hin,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_hin' => $request->short_descp_hin,
            'long_descp_en' => $request->short_descp_en,
            'long_descp_hin' => $request->short_descp_hin,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Producted Update without image Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('manage.products')->with($notification);
    }
    public function MultiImageUpdate(Request $request)
    {
        $image = $request->multi_img;
        foreach ($image as $id => $img) {
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);
            $name_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/products/multi-image/' . $name_gen);
            $upload_url = 'upload/products/multi-image/' . $name_gen;
            MultiImg::where('id', $id)->update([
                'photo_name' => $upload_url,
                'updated_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => 'Producted Image Update Successfully',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        } //end for foreach
    }
    public function ThumbnailImageUpdate(Request $request)
    {
        $thumbnail_id = $request->id;
        $old_image = $request->old_image;
        unlink($old_image);
        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/products/thumbnail/' . $name_gen);
        $save_url = 'upload/products/thumbnail/' . $name_gen;
        Product::findOrFail($thumbnail_id)->update([

            'product_thumbnail' => $save_url,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Producted Thumbnail Image Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
    public function MultiimgDelete($id)
    {
        $oldimg = MultiImg::findOrFail($id);
        unlink($oldimg->photo_name);
        MultiImg::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Producted Image Delete Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function InactiveProducts($id)
    {
        Product::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Product Inactive',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function ActiveProducts($id)
    {
        Product::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Product Active',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function ProductsDelete($id)
    {
        $products = Product::findOrFail($id);
        unlink($products->product_thumbnail);
        Product::findOrFail($id)->delete();
        $imges = MultiImg::where('product_id', $id)->get();
        foreach ($imges as $img) {
            unlink($img->photo_name);
            MultiImg::where('product_id', $id)->delete();
        }
        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
