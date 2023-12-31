<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubSubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\User\AllUserController;
use App\Http\Controllers\User\CashController;
use App\Http\Controllers\Backend\ReturnController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\Backend\AdminUserController;




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

Route::get('/language/{locale}', [LanguageController::class, 'switchLanguage'])->name('language.switch');

Route::middleware('admin:admin')->group(function(){
    Route::get('admin/login',[AdminController::class,'LoginForm']);
    Route::post('admin/login',[AdminController::class,'store'])->name('admin.login');
});

Route::middleware(['auth:admin'])->group(function(){
    Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard')->middleware('auth:admin');
    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
    Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
    Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/update/change/password', [AdminProfileController::class, 'AdminUpdateChangePassword'])->name('update.change.password');

    Route::get('/brand/view', [BrandController::class, 'BrandView'])->name('all.brand');
    Route::post('/brand/store', [BrandController::class, 'BrandStore'])->name('brand.store');
    Route::get('/brand/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit');
    Route::post('/brand/update', [BrandController::class, 'BrandUpdate'])->name('brand.update');
    Route::get('/brand/delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete');

    Route::get('/category/view', [CategoryController::class, 'CategoryView'])->name('all.category');
    Route::post('/category/store', [CategoryController::class, 'CategoryStore'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');
    Route::post('/category/update/{id}', [CategoryController::class, 'CategoryUpdate'])->name('category.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete');

    Route::get('/sub/view', [SubCategoryController::class, 'SubCategoryView'])->name('all.subcategory');
    Route::get('/sub/add', [SubCategoryController::class, 'SubCategoryAdd'])->name('add.subcategory');
    Route::post('/sub/store', [SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store');
    Route::get('/sub/edit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit');
    Route::post('/update', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update');
    Route::get('/sub/delete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete');
    
    Route::get('/sub/sub/view', [SubSubCategoryController::class, 'SubSubCategoryView'])->name('all.subsubcategory');
    Route::get('/subcategory/ajax', [SubSubCategoryController::class, 'GetSubCategory'])->name('get.subCategory');
    Route::get('/subSub/add', [SubSubCategoryController::class, 'SubSubCategoryAdd'])->name('add.subsubcategory');
    Route::get('/sub-subcategory/ajax', [SubSubCategoryController::class, 'GetSubSubCategory']);
    Route::post('/sub/sub/store', [SubSubCategoryController::class, 'SubSubCategoryStore'])->name('subsubcategory.store');
    Route::get('/sub/sub/edit/{id}', [SubSubCategoryController::class, 'SubSubCategoryEdit'])->name('subsubcategory.edit');
    Route::post('/sub/update', [SubSubCategoryController::class, 'SubSubCategoryUpdate'])->name('subsubcategory.update');
    Route::get('/sub/sub/delete/{id}', [SubSubCategoryController::class, 'SubSubCategoryDelete'])->name('subsubcategory.delete');

    Route::get('/add', [ProductController::class, 'AddProduct'])->name('add-product');
    Route::post('/store', [ProductController::class, 'StoreProduct'])->name('product-store');
    Route::get('/manage', [ProductController::class, 'ManageProduct'])->name('manage-product');
    Route::get('/edit/{id}', [ProductController::class, 'EditProduct'])->name('product.edit');
    Route::post('/data/update', [ProductController::class, 'ProductDataUpdate'])->name('product-update');
    Route::post('/image/update', [ProductController::class, 'MultiImageUpdate'])->name('update-product-image');
    Route::post('/thambnail/update', [ProductController::class, 'ThambnailImageUpdate'])->name('update-product-thambnail');
    Route::get('/multiimg/delete/{id}', [ProductController::class, 'MultiImageDelete'])->name('product.multiimg.delete');
    Route::get('/inactive/{id}', [ProductController::class, 'ProductInactive'])->name('product.inactive');
    Route::get('/active/{id}', [ProductController::class, 'ProductActive'])->name('product.active');
    Route::get('/delete/{id}', [ProductController::class, 'ProductDelete'])->name('product.delete');

    Route::get('slider/view', [SliderController::class, 'SliderView'])->name('manage-slider');
    Route::post('slider/store', [SliderController::class, 'SliderStore'])->name('slider.store');
    Route::get('slider/edit/{id}', [SliderController::class, 'SliderEdit'])->name('slider.edit');
    Route::post('slider/update', [SliderController::class, 'SliderUpdate'])->name('slider.update');
    Route::get('slider/delete/{id}', [SliderController::class, 'SliderDelete'])->name('slider.delete');
    Route::get('slider/inactive/{id}', [SliderController::class, 'SliderInactive'])->name('slider.inactive');
    Route::get('slider/active/{id}', [SliderController::class, 'SliderActive'])->name('slider.active');

    Route::get('coupon/view', [CouponController::class, 'CouponView'])->name('manage-coupon');
    Route::post('coupon/store', [CouponController::class, 'CouponStore'])->name('coupon.store');
    Route::get('coupon/edit/{id}', [CouponController::class, 'CouponEdit'])->name('coupon.edit');
    Route::post('coupon/update/{id}', [CouponController::class, 'CouponUpdate'])->name('coupon.update');
    Route::get('coupon/delete/{id}', [CouponController::class, 'CouponDelete'])->name('coupon.delete');
    
    // Ship Division 
    Route::get('/division/view', [ShippingAreaController::class, 'DivisionView'])->name('manage-division');
    Route::post('/division/store', [ShippingAreaController::class, 'DivisionStore'])->name('division.store');
    Route::get('/division/edit/{id}', [ShippingAreaController::class, 'DivisionEdit'])->name('division.edit');
    Route::post('/division/update/{id}', [ShippingAreaController::class, 'DivisionUpdate'])->name('division.update');
    Route::get('/division/delete/{id}', [ShippingAreaController::class, 'DivisionDelete'])->name('division.delete');
    // Ship District 
    Route::get('/district/view', [ShippingAreaController::class, 'DistrictView'])->name('manage-district');
    Route::post('/district/store', [ShippingAreaController::class, 'DistrictStore'])->name('district.store');
    Route::get('/district/edit/{id}', [ShippingAreaController::class, 'DistrictEdit'])->name('district.edit');
    Route::post('/district/update/{id}', [ShippingAreaController::class, 'DistrictUpdate'])->name('district.update');
    Route::get('/district/delete/{id}', [ShippingAreaController::class, 'DistrictDelete'])->name('district.delete');
    // Ship State 
    Route::get('/state/view', [ShippingAreaController::class, 'StateView'])->name('manage-state');
    Route::post('/state/store', [ShippingAreaController::class, 'StateStore'])->name('state.store');
    Route::get('/state/edit/{id}', [ShippingAreaController::class, 'StateEdit'])->name('state.edit');
    Route::post('/state/update/{id}', [ShippingAreaController::class, 'StateUpdate'])->name('state.update');
    Route::get('/state/delete/{id}', [ShippingAreaController::class, 'StateDelete'])->name('state.delete');

    Route::get('/pending/orders', [OrderController::class, 'PendingOrders'])->name('pending-orders');
    Route::get('/pending/orders/details/{order_id}', [OrderController::class, 'PendingOrdersDetails'])->name('pending.order.details');
    Route::get('/confirmed/orders', [OrderController::class, 'ConfirmedOrders'])->name('confirmed-orders');
    Route::get('/processing/orders', [OrderController::class, 'ProcessingOrders'])->name('processing-orders');
    Route::get('/picked/orders', [OrderController::class, 'PickedOrders'])->name('picked-orders');
    Route::get('/shipped/orders', [OrderController::class, 'ShippedOrders'])->name('shipped-orders');
    Route::get('/delivered/orders', [OrderController::class, 'DeliveredOrders'])->name('delivered-orders');
    Route::get('/cancel/orders', [OrderController::class, 'CancelOrders'])->name('cancel-orders');
    // Update Status 
    Route::get('/pending/confirm/{order_id}', [OrderController::class, 'PendingToConfirm'])->name('pending-confirm');
    Route::get('/confirm/processing/{order_id}', [OrderController::class, 'ConfirmToProcessing'])->name('confirm.processing');
    Route::get('/processing/picked/{order_id}', [OrderController::class, 'ProcessingToPicked'])->name('processing.picked');
    Route::get('/picked/shipped/{order_id}', [OrderController::class, 'PickedToShipped'])->name('picked.shipped');
    Route::get('/shipped/delivered/{order_id}', [OrderController::class, 'ShippedToDelivered'])->name('shipped.delivered');
    Route::get('/invoice/download/{order_id}', [OrderController::class, 'AdminInvoiceDownload'])->name('invoice.download');
    
    Route::get('/admin/request', [ReturnController::class, 'ReturnRequest'])->name('return.request');
    Route::get('/admin/return/approve/{order_id}', [ReturnController::class, 'ReturnRequestApprove'])->name('return.approve');
    Route::get('/admin/all/request', [ReturnController::class, 'ReturnAllRequest'])->name('all.request');

    Route::get('report/view', [ReportController::class, 'ReportView'])->name('all-reports');
    Route::post('report/search/by/date', [ReportController::class, 'ReportByDate'])->name('search-by-date');
    Route::post('report/search/by/month', [ReportController::class, 'ReportByMonth'])->name('search-by-month');
    Route::post('report/search/by/year', [ReportController::class, 'ReportByYear'])->name('search-by-year');

    Route::get('/site', [SiteSettingController::class, 'SiteSetting'])->name('site.setting');
    Route::post('/site/update', [SiteSettingController::class, 'SiteSettingUpdate'])->name('update.sitesetting');
    Route::get('/seo', [SiteSettingController::class, 'SeoSetting'])->name('seo.setting'); 
    Route::post('/seo/update', [SiteSettingController::class, 'SeoSettingUpdate'])->name('update.seosetting');

    Route::get('users/view', [AdminProfileController::class, 'AllUsers'])->name('all-users');

    Route::get('review/pending', [ReviewController::class, 'PendingReview'])->name('pending.review');
    Route::get('review/admin/approve/{id}', [ReviewController::class, 'ReviewApprove'])->name('review.approve');
    Route::get('review/publish', [ReviewController::class, 'PublishReview'])->name('publish.review');
    Route::get('review/delete/{id}', [ReviewController::class, 'DeleteReview'])->name('delete.review');

    Route::get('/product', [ProductController::class, 'ProductStock'])->name('product.stock');


    Route::get('adminuserrole/all', [AdminUserController::class, 'AllAdminRole'])->name('all.admin.user');
    Route::get('adminuserrole/add', [AdminUserController::class, 'AddAdminRole'])->name('add.admin');
    Route::post('adminuserrole/store', [AdminUserController::class, 'StoreAdminRole'])->name('admin.user.store');
    Route::get('adminuserrole/edit/{id}', [AdminUserController::class, 'EditAdminRole'])->name('edit.admin.user');
    Route::post('adminuserrole/update', [AdminUserController::class, 'UpdateAdminRole'])->name('admin.user.update');
    Route::get('adminuserrole/delete/{id}', [AdminUserController::class, 'DeleteAdminRole'])->name('delete.admin.user');

});

Route::middleware(['auth:sanctum,web',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
    Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');
    Route::post('/user/profile',[IndexController::class,'UserProfileStore'])->name('user.profile.store');
    Route::get('/user/change/password', [IndexController::class, 'UserChangePassword'])->name('change.password');
    Route::post('/user/password/update', [IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');
});

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');
Route::get('/product/details/{id}/{slug}', [IndexController::class, 'ProductDetails']);
Route::get('/product/tag/{tag}', [IndexController::class, 'TagWiseProduct']);
Route::get('/subcategory/product/{subcat_id}/{slug}', [IndexController::class, 'SubCatWiseProduct']);
Route::get('/subsubcategory/product/{subsubcat_id}/{slug}', [IndexController::class, 'SubSubCatWiseProduct']);
Route::get('/product/view/modal', [IndexController::class, 'ProductViewAjax']);

Route::post('/cart/data/store/', [CartController::class, 'AddToCart']);
Route::get('/product/mini/cart/', [CartController::class, 'AddMiniCart']);
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']);
Route::post('/add-to-wishlist/{product_id}', [CartController::class, 'AddToWishlist']);

Route::middleware(['user','auth'])->group(function(){

    Route::get('/mycart', [CartPageController::class, 'MyCart'])->name('mycart');
    Route::get('/user/get-cart-product', [CartPageController::class, 'GetCartProduct']);
    Route::get('/user/cart-remove/{rowId}', [CartPageController::class, 'RemoveCartProduct']);
    Route::get('/cart-increment/{rowId}', [CartPageController::class, 'CartIncrement']);
    Route::get('/cart-decrement/{rowId}', [CartPageController::class, 'CartDecrement']);

    Route::get('user/wishlist', [WishlistController::class, 'ViewWishlist'])->name('wishlist');
    Route::get('user/get-wishlist-product', [WishlistController::class, 'GetWishlistProduct']);
    Route::get('user/wishlist-remove/{id}', [WishlistController::class, 'RemoveWishlistProduct']);
    
    Route::post('/coupon-apply', [CartController::class, 'CouponApply']);
    Route::get('/coupon-calculation', [CartController::class, 'CouponCalculation']);
    Route::get('/coupon-remove', [CartController::class, 'CouponRemove']);

    Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');
    Route::get('/district-get/ajax', [CheckoutController::class, 'DistrictGetAjax']);
    Route::get('/state-get/ajax', [CheckoutController::class, 'StateGetAjax']);
    Route::post('/checkout/store', [CheckoutController::class, 'CheckoutStore'])->name('checkout.store');

    Route::post('coupon/user/stripe/order', [StripeController::class, 'StripeOrder'])->name('stripe.order');
    Route::post('/stripe/order', [StripeController::class, 'StripeOrder'])->name('stripe.order');

    Route::post('user/cash/order', [CashController::class, 'CashOrder'])->name('cash.order');

    Route::get('user/my/orders', [AllUserController::class, 'MyOrders'])->name('my.orders');
    Route::get('user/order_details/{order_id}', [AllUserController::class, 'OrderDetails']);
    Route::get('user/invoice_download/{order_id}', [AllUserController::class, 'InvoiceDownload']);
    Route::post('user/return/order/{order_id}', [AllUserController::class, 'ReturnOrder'])->name('return.order');
    Route::get('user/return/order/list', [AllUserController::class, 'ReturnOrderList'])->name('return.order.list');
    Route::get('user/cancel/orders', [AllUserController::class, 'CancelOrders'])->name('cancel.orders');
    Route::post('user/order/tracking', [AllUserController::class, 'OrderTraking'])->name('order.tracking');    
    
    Route::post('/review/store', [ReviewController::class, 'ReviewStore'])->name('review.store');

    });