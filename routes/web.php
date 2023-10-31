<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandsController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Fontend\IndexController;
use App\Http\Controllers\Fontend\LanguageController;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});
Route::middleware(['auth:admin'])->group(function () {
    Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
    // admin all route
    // admin.profile
    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
    Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
    Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/update/change/password', [AdminProfileController::class, 'AdminUpdateChangePassword'])->name('update.change.password');
});
// end middleware
// user all route 
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard', compact('user'));
})->name('dashboard');
Route::get('/', [IndexController::class, 'index']);
Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');
Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');
Route::post('/user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');
Route::get('/user/change/password', [IndexController::class, 'UserChangePassword'])->name('user.change.password');
Route::post('/user/change/store', [IndexController::class, 'UserChangeStore'])->name('user.change.store');
// Admin Brand All Route 
Route::prefix('brand')->group(function () {
    Route::get('/view', [BrandsController::class, 'BrandView'])->name('all.brand');
    Route::post('/store', [BrandsController::class, 'StoreBrand'])->name('brand.store');
    Route::get('/edit/{id}', [BrandsController::class, 'BrandEdit'])->name('brand.edit');
    Route::post('/update', [BrandsController::class, 'BrandUpdate'])->name('brand.update');
    Route::get('/delete/{id}', [BrandsController::class, 'BrandDelete'])->name('brand.delete');
});
// Admin Category All Route 
Route::prefix('category')->group(function () {
    Route::get('/view', [CategoryController::class, 'CategoryView'])->name('all.category');
    Route::post('/store', [CategoryController::class, 'StoreCategory'])->name('category.store');
    Route::get('/category/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');
    Route::post('/update', [CategoryController::class, 'CategoryUpdate'])->name('category.update');
    Route::get('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');
    // Admin SubCategory All Route 
    Route::get('/sub/view', [SubCategoryController::class, 'SubCategoryView'])->name('all.subcategory');
    Route::post('/sub/store', [SubCategoryController::class, 'StoreSubCategory'])->name('subcategory.store');
    Route::get('/subcategory/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');
    Route::post('/sub/update', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');
    Route::get('/sub/delete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');
    // 
    // Admin SubCategory All Route 
    Route::get('/sub/sub/view', [SubCategoryController::class, 'SubSubCategoryView'])->name('all.subsubcategory');
    Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'GetsubCategory']);
    Route::get('/sub-subcategory/ajax/{subcategory_id}', [SubCategoryController::class, 'GetSubsubCategory']);
    Route::post('/sub/sub/store', [SubCategoryController::class, 'SubStoreSubCategory'])->name('subsubcategory.store');
    Route::get('/subsubcategory/{id}', [SubCategoryController::class, 'SubSubCategoryEdit'])->name('subsubcategory.edit');
    Route::post('/subsub/update', [SubCategoryController::class, 'SubSubCategoryUpdate'])->name('subsubcategory.update');
    Route::get('/subsub/delete/{id}', [SubCategoryController::class, 'SubSubCategoryDelete'])->name('subsubcategory.delete');
    // 
});
// Admin Products All Route 
Route::prefix('Products')->group(function () {
    Route::get('/add', [ProductController::class, 'ProductsAdd'])->name('all.product');
    Route::post('/store', [ProductController::class, 'ProductStore'])->name('product.store');
    Route::get('/manage', [ProductController::class, 'ManageProducts'])->name('manage.products');
    Route::get('/edit/{id}', [ProductController::class, 'ProductsEdit'])->name('products.edit');
    Route::post('/update', [ProductController::class, 'ProductsUpdate'])->name('product.update');
    Route::post('/image/update', [ProductController::class, 'MultiImageUpdate'])->name('update.product.image');
    Route::post('/thumbnail/update', [ProductController::class, 'ThumbnailImageUpdate'])->name('update.product.thumbnail');
    Route::get('/multiimg/delete/{id}', [ProductController::class, 'MultiimgDelete'])->name('product.multiimg.delete');
    Route::get('/inactive/products/{id}', [ProductController::class, 'InactiveProducts'])->name('inactive.products');
    Route::get('/active/products/{id}', [ProductController::class, 'ActiveProducts'])->name('active.products');
    Route::get('/delete/{id}', [ProductController::class, 'ProductsDelete'])->name('product.delete');
});
// Admin Slder All Route 
Route::prefix('slider')->group(function () {
    Route::get('/view', [SliderController::class, 'ManageView'])->name('manage.slider');
    Route::post('/store', [SliderController::class, 'SliderStore'])->name('slider.store');
    Route::get('/edit/{id}', [SliderController::class, 'SliderEdit'])->name('slider.edit');
    Route::post('/update', [SliderController::class, 'SliderUpdate'])->name('slider.update');
    Route::get('/delete/{id}', [SliderController::class, 'SliderDelete'])->name('slider.delete');
    Route::get('/inactive/slider/{id}', [SliderController::class, 'InactiveSlider'])->name('inactive.slider');
    Route::get('/active/slider/{id}', [SliderController::class, 'ActiveSlider'])->name('active.slider');
});
// multi all language
Route::get('/hindi/language,', [LanguageController::class, 'Hindi'])->name('hindi.language');
Route::get('/english/language,', [LanguageController::class, 'English'])->name('english.language');
