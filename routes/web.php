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

Route::group(['prefix' => '/'],function(){

    Route::get('/','ClientController@home')->name('home');
    Route::get('about','ClientController@about')->name('about');
    Route::get('product','ClientController@product')->name('product');
    Route::get('service','ClientController@service')->name('service');
    Route::get('construction','ClientController@construction')->name('construction');
    Route::get('contact','ClientController@contact')->name('contact');
    Route::get('product-detail/{slug}','ClientController@product_detail')->name('product-detail');
    Route::get('blog-detail/{slug}','ClientController@blog_detail')->name('blog-detail');
    Route::get('cate-product/{slug}','ClientController@cate_product')->name('cate-product');
    Route::get('search','ClientController@getsearch')->name('search');

    Route::get('my-account','ClientController@my_account')->name('my-account');

    Route::get('info-account/{id}','ClientController@info_account')->name('info-account');
    Route::post('info-account/{id}','ClientController@edit_account');
});

Route::group(['prefix' => 'admin','namespace'=>'admin','middleware'=>'auth'],function(){

    // giao diện quản trị
    Route::get('/','adminController@admin')->name('admin');
    Route::get('edit-profile/{id}','adminController@edit_profile')->name('edit-profile');
    Route::post('edit-profile/{id}','adminController@update_profile')->name('edit-profile');

    include 'admin/category.php';
    include 'admin/admin.php';
    include 'admin/category.php';
    include 'admin/products.php';
    include 'admin/customer.php';
    include 'admin/attribute.php';
    include 'admin/attr_values.php';
    include 'admin/attr_product.php';
    include 'admin/blog.php';
    include 'admin/brand.php';
    include 'admin/banner.php';
    include 'admin/config.php';
    include 'admin/construction.php';
    include 'admin/consultant.php';
});

// giao diện login
Route::get('admin/login','admin\adminController@login_admin') -> name('login');
Route::post('admin/login','admin\adminController@postLogin_admin') -> name('postLogin');
Route::get('admin/logout','admin\adminController@logout_admin') -> name('logout');


Route::group(['prefix' => 'cart'], function () {
    Route::get('/','CartController@cart')->name('cart');
    Route::get('add-cart/{id}','cartController@add_cart') -> name('add_cart');
    Route::get('delete-cart/{id}','cartController@delete_cart') -> name('delete-cart');
    Route::get('clear-cart','cartController@clear_cart') -> name('clear-cart');
    Route::post('update-cart/{id_pro}','cartController@update_cart') -> name('update-cart');
    Route::get('checkout','orderController@checkout')->name('checkout');
    Route::post('/checkout','orderController@post_checkout') -> name('post-checkout');
    Route::get('/order-error','orderController@error') -> name('order-error');
    Route::get('/history','orderController@history') -> name('history-checkout');
    Route::get('/detail-order/{id}','orderController@detail') -> name('detail-order');
});

Route::group(['prefix' => 'account'], function () {
    Route::get('register','LoginController@register')->name('register_user');
    Route::post('register','LoginController@postRegister')->name('postRegister');

    Route::get('login','LoginController@login')->name('login_user');
    Route::post('login','LoginController@postLogin')->name('postLogin_user');

    Route::get('log-out','LoginController@postLogOut')->name('log-out');

    Route::get('forget-pass','LoginController@forget_pass')->name('forget-pass');
    Route::post('forget-pass','LoginController@sendCodeReset');

    Route::get('forget-pass/reset','LoginController@resetPassword')->name('getLinkReset');
    Route::post('forget-pass/reset','LoginController@saveResetPassword')->name('getResetPassword');

});

Route::any('getprice','GetController@getPrice')->name('getprice');
Route::any('getcategory','GetController@getCategory')->name('getcategory');
Route::any('orderby','GetController@getOrDerby')->name('orderby');
Route::get('shop','ClientController@shop') -> name('shop');
Route::any('filter','ClientController@filter') -> name('filter');
Route::post('/add-consultant','admin\consultantController@store') -> name('add-consultant');
