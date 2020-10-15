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


Route::match(['get', 'post'], '/', 'IndexController@index');
Route::match(['get', 'post'], '/admin', 'AdminController@login');
Route::get('/products/{id}', 'ProductController@products');


Auth::routes();

Route::group(['middleware' =>['auth']], function(){
	Route::match(['get', 'post'],'/admin_dashboard', 'AdminController@dashboard');

    //Category Routes
     Route::match(['get', 'post'], '/admin/add_category', 'CategoryController@addCategory');
     Route::get('/admin/view_Categories', 'CategoryController@viewCategories');
     Route::match(['get', 'post'], '/admin/edit-category/{id}', 'CategoryController@editCategory');
     Route::match(['get', 'post'], '/admin/delete-category/{id}', 'CategoryController@deleteCategory');
     Route::get('/admin/update-category-status', 'CategoryController@updateStatus');




	//Product Routes
	Route::match(['get', 'post'], '/admin/add_product', 'ProductController@add_product');
	Route::get('admin/view_products', 'ProductController@view_products');
	Route::match(['get', 'post'], '/admin/edit-product/{id}', 'ProductController@edit_product');
	Route::match(['get', 'post'], '/admin/delete-product/{id}', 'ProductController@delete_product');
	Route::get('/admin/update-product-status/{id}/{s}', 'ProductController@updateStatus')->name('ProductStatus');


    // ********Product Attributes
    Route::match(['get', 'post'], '/admin/add_attributes/{id}', 'ProductController@add_attributes');

	//******* Routes for banners
	Route::match(['get', 'post'], '/admin/add_banners', 'BannerController@add_banners');
	Route::match(['get', 'post'], '/admin/banners', 'BannerController@banners');
	Route::match(['get', 'post'], '/admin/edit_banner/{id}' , 'BannerController@edit_banner');
	Route::get('/delete/{id}', 'BannerController@delete_banner');

});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'AdminController@logout');