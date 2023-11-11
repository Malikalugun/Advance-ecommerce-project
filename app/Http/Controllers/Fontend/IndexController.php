<?php

namespace App\Http\Controllers\Fontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index()
    {
        $slider = Slider::where('status', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $product = Product::where('status', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $featured = Product::where('featured', 1)->orderBy('id', 'DESC')->limit(6)->get();
        $hot_deal = Product::where('hot_deals', 1)->where('discount_price', '!=', NULL)->orderBy('id', 'DESC')->limit(3)->get();
        $special_offer = Product::where('special_offer', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $special_deals = Product::where('special_deals', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $skip_category_0 = Category::skip(0)->first();
        $skip_product_0 = Product::where('status', 1)->where('category_id', $skip_category_0->id)->orderBy('id', 'DESC')->get();
        $skip_category_1 = Category::skip(1)->first();
        $skip_product_1 = Product::where('status', 1)->where('category_id', $skip_category_1->id)->limit(3)->orderBy('id', 'DESC')->limit(3)->get();
        $skip_brand_1 = Brand::skip(1)->first();
        $skip_brand_product_1 = Product::where('status', 1)->where('brand_id', $skip_brand_1->id)->limit(3)->orderBy('id', 'DESC')->limit(3)->get();
        // return $skip_category->id;
        // die();
        return view('fontend.index', compact('categories', 'slider', 'product', 'featured', 'hot_deal', 'special_offer', 'special_deals', 'skip_category_0', 'skip_product_0', 'skip_category_1', 'skip_product_1', 'skip_brand_1', 'skip_brand_product_1'));
    }
    public function UserLogout()
    {
        Auth::logout();
        return Redirect()->route('login');
    }
    public function UserProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('fontend.profile.user_profile', compact('user'));
    }
    public function UserProfileStore(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        if ($request->file('profile_photo_path')) {
            @unlink(public_path('upload/user_images/' . $data->profile_photo_path));
            $file = $request->file('profile_photo_path');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('dashboard')->with($notification);
    }
    public function UserChangePassword()
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('fontend.profile.change_password', compact('user'));
    }
    public function UserChangeStore(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',

        ]);
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');
        } else {
            return redirect()->back();
        }
    }
    public function ProductDetails($id, $slug)
    {
        $multi_img = MultiImg::where('product_id', $id)->get();
        $product = Product::findOrFail($id);
        $color_en = $product->product_color_en;
        $product_color_en = explode(',', $color_en);
        $color_hin = $product->product_color_hin;
        $product_color_hin = explode(',', $color_hin);
        $size_en = $product->product_size_en;
        $product_size_en = explode(',', $size_en);
        $size_hin = $product->product_size_hin;
        $product_size_hin = explode(',', $size_hin);
        $hot_deal = Product::where('hot_deals', 1)->where('discount_price', '!=', NULL)->orderBy('id', 'DESC')->limit(3)->get();
        // remove explode
        $cat_id = $product->category_id;
        $related_product = Product::where('category_id', $cat_id)->where('id', '!=', $id)->orderBy('id', 'DESC')->get();
        return view('fontend/product/product_details', compact('product', 'multi_img', 'color_en', 'color_hin', 'product_color_en', 'product_color_hin', 'size_en', 'size_hin', 'product_size_en', 'product_size_hin', 'related_product', 'hot_deal'));
    }
    public function TagWishProduct($tag)
    {
        $product = Product::where('status', 1)->where('product_tags_en', $tag)->where('product_tags_hin', $tag)->orderBy('id', 'DESC')->paginate(3);
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        return view('fontend.tags.tags_view', compact('product', 'categories'));
    }
    // sub category wise data
    public function SubCatWiseProduct($subcat_id, $slug)
    {
        $product = Product::where('status', 1)->where('subcategory_id', $subcat_id)->orderBy('id', 'DESC')->paginate(3);
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        return view('fontend.product.subcategory_view', compact('product', 'categories'));
    }
    public function SubSubCatWiseProduct($subsubcat_id, $slug)
    {
        $product = Product::where('status', 1)->where('subsubcategory_id', $subsubcat_id)->orderBy('id', 'DESC')->paginate(6);
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        return view('fontend.product.sub_subcategory_view', compact('product', 'categories'));
    }
}
