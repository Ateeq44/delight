<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::view('test', 'test');
Route::get('search', [App\Http\Controllers\frontend\frontendcontroller::class, 'searchshop']);
// Route::get('mail', [App\Http\Controllers\frontend\mailcontroller::class, 'sendmail']);
Route::get('/', [App\Http\Controllers\frontend\frontendcontroller::class, 'index']);
Route::get('view-category/{slug}', [App\Http\Controllers\frontend\frontendcontroller::class, 'view_category']);
Route::get('subcategory/{slug}', [App\Http\Controllers\frontend\frontendcontroller::class, 'view_subcategory']);
Route::get('shop', [App\Http\Controllers\frontend\frontendcontroller::class, 'shop']);
Route::get('view-category/{cate_slug}/{pro_slug}', [App\Http\Controllers\frontend\frontendcontroller::class, 'view_product']);
Route::get('My-Profile', [App\Http\Controllers\HomeController::class, 'myprofile']);

Route::get('blog', [App\Http\Controllers\frontend\blogcontroller::class, 'blog']);
Route::get('view-blog/{id}', [App\Http\Controllers\frontend\blogcontroller::class, 'blogshow']);
Route::get('add-category', [App\Http\Controllers\admin\blogcontroller::class, 'addcategory']);
Route::post('blog-review', [App\Http\Controllers\frontend\blogcontroller::class, 'blogreview']);

Route::get('add-to-wishlist', [App\Http\Controllers\frontend\wishlistcontroller::class, 'add']);
Route::get('wishlist-delete/{id}', [App\Http\Controllers\frontend\wishlistcontroller::class, 'delete']);

Route::get('contact', [App\Http\Controllers\frontend\contactcontroller::class, 'contact']);
Route::post('message', [App\Http\Controllers\frontend\contactcontroller::class, 'contactpost']);

Route::get('search_product', [App\Http\Controllers\frontend\frontendcontroller::class, 'search']);
Route::post('search', [App\Http\Controllers\frontend\frontendcontroller::class, 'searchproduct']);


Auth::routes();
Route::middleware(['auth'])->group(function () {

    Route::get('add-to-cart', [App\Http\Controllers\frontend\cartcontroller::class, 'addproduct']);
    Route::get('cart', [App\Http\Controllers\frontend\cartcontroller::class, 'viewcart']);
    Route::get('cart-delete/{id}', [App\Http\Controllers\frontend\cartcontroller::class, 'delete']);
    Route::get('checkout', [App\Http\Controllers\frontend\checkoutController::class, 'checkout']);
    Route::post('place_order', [App\Http\Controllers\frontend\checkoutController::class, 'placeorder']);
    Route::get('my_order', [App\Http\Controllers\frontend\userordercontroller::class, 'myorder']);
    Route::get('view_order/{id}', [App\Http\Controllers\frontend\userordercontroller::class, 'view']);

    Route::get('stripe', [App\Http\Controllers\frontend\StripePaymentController::class, 'stripe']);
    Route::post('stripe', [App\Http\Controllers\frontend\StripePaymentController::class, 'stripePost'])->name('stripe.post');

    route::get('increase/{id}', [App\Http\Controllers\frontend\cartcontroller::class, 'increase']);
    route::get('decrease/{id}', [App\Http\Controllers\frontend\cartcontroller::class, 'decrease']);

    Route::get('wishlist', [App\Http\Controllers\frontend\wishlistcontroller::class, 'index']);

    Route::post('add-rating', [App\Http\Controllers\frontend\ratingcontroller::class, 'addrating']);

    Route::post('user-address', [App\Http\Controllers\frontend\checkoutController::class, 'useradress_save']);
    Route::post('update-address/{id}', [App\Http\Controllers\frontend\checkoutController::class, 'address_update']);

    Route::post('user-payment', [App\Http\Controllers\frontend\checkoutController::class, 'user_payment']);
    Route::post('update-payment/{id}', [App\Http\Controllers\frontend\checkoutController::class, 'payment_update']);

});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('Dashboard', [App\Http\Controllers\admin\admincontroller::class, 'dashboard']);
    Route::get('submit-category', [App\Http\Controllers\admin\categoryController::class, 'category']);
    Route::post('insert-category', [App\Http\Controllers\admin\categoryController::class, 'insert']);
    Route::get('View-category', [App\Http\Controllers\admin\categoryController::class, 'ViewCategory']);
    Route::get('cate-delete/{id}', [App\Http\Controllers\admin\categoryController::class, 'delete']);
    Route::get('cate-edit/{id}', [App\Http\Controllers\admin\categoryController::class, 'edit']);
    Route::post('update-category/{id}', [App\Http\Controllers\admin\categoryController::class, 'update']);
    // sub category
    Route::get('submit-subcategory', [App\Http\Controllers\admin\SubCategoryController::class, 'create']);
    Route::post('insert-subcategory', [App\Http\Controllers\admin\SubCategoryController::class, 'store']);
    Route::get('View-subcategory', [App\Http\Controllers\admin\SubCategoryController::class, 'show']);
    Route::get('subcate-delete/{id}', [App\Http\Controllers\admin\SubCategoryController::class, 'delete']);
    Route::get('subcate-edit/{id}', [App\Http\Controllers\admin\SubCategoryController::class, 'edit']);
    Route::post('update-subcategory/{id}', [App\Http\Controllers\admin\SubCategoryController::class, 'update']);

    // Product
    Route::get('view-product', [App\Http\Controllers\admin\productController::class, 'ViewProduct']);
    Route::get('submit-product', [App\Http\Controllers\admin\productController::class, 'product']);
    Route::post('insert-product', [App\Http\Controllers\admin\productController::class, 'insert']);
    Route::get('product-delete/{id}', [App\Http\Controllers\admin\productcontroller::class, 'delete']);
    Route::get('product-edit/{id}', [App\Http\Controllers\admin\productcontroller::class, 'edit']);
    Route::post('update-product/{id}', [App\Http\Controllers\admin\productcontroller::class, 'update']);
    Route::get('product-view/{id}', [App\Http\Controllers\admin\productcontroller::class, 'view']);

    Route::get('orders', [App\Http\Controllers\admin\ordercontroller::class, 'index']);
    Route::get('order-view/{id}', [App\Http\Controllers\admin\ordercontroller::class, 'view']);
    Route::get('order-Accepted', [App\Http\Controllers\admin\ordercontroller::class, 'orderAccepted']);
    Route::get('order-Packed', [App\Http\Controllers\admin\ordercontroller::class, 'orderPacked']);
    Route::get('order-Shipped', [App\Http\Controllers\admin\ordercontroller::class, 'orderShipped']);
    Route::get('order-Delivered', [App\Http\Controllers\admin\ordercontroller::class, 'orderDelivered']);


    Route::post('update-order/{id}', [App\Http\Controllers\admin\ordercontroller::class, 'updateorder']);

    Route::get('add-blog', [App\Http\Controllers\admin\blogcontroller::class, 'addBlog']);
    Route::post('insert-blog', [App\Http\Controllers\admin\blogcontroller::class, 'insert']);
    Route::get('view-blog', [App\Http\Controllers\admin\blogcontroller::class, 'viewBlog']);
    Route::get('edit-blog/{id}', [App\Http\Controllers\admin\blogcontroller::class, 'edit_blog']);
    Route::post('update-blog/{id}', [App\Http\Controllers\admin\blogcontroller::class, 'update_blog']);
    Route::get('blog-delete/{id}', [App\Http\Controllers\admin\blogcontroller::class, 'delete']);


    Route::get('users', [App\Http\Controllers\admin\admincontroller::class, 'users']);
    Route::get('user-view/{id}', [App\Http\Controllers\admin\admincontroller::class, 'view']);
    Route::post('userupdate/{id}', [App\Http\Controllers\admin\admincontroller::class, 'update']);

    Route::get('detail', [App\Http\Controllers\admin\admincontroller::class, 'detail']);
    Route::post('submit-detail', [App\Http\Controllers\admin\admincontroller::class, 'submit_detail']);
    Route::get('view-detail', [App\Http\Controllers\admin\admincontroller::class, 'view_detail']);
    Route::get('details-delete/{id}', [App\Http\Controllers\admin\admincontroller::class, 'details_destroy']);
    Route::get('view-detail', [App\Http\Controllers\admin\admincontroller::class, 'view_detail']);

});
