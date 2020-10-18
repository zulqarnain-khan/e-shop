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


// Admin All Routes
Route::prefix('admin')->group(function () {
	//Login and authentication
	Route::get('/','admin\AdminConroller@show');
	Route::post('user/authentication','admin\AdminConroller@store');



	Route::group(['middleware' => ['admin']], function () {
		//Dashboard
		Route::get('dashboard','admin\AdminConroller@index');

		// Categories
		Route::prefix('categories')->group(function () {
			//Show All
			Route::get('list','admin\CategoriesController@index');

			// Create Category
			Route::get('create','admin\CategoriesController@create');
			Route::post('store','admin\CategoriesController@store');

			// update Category
			Route::get('edit/{id}','admin\CategoriesController@edit');
			Route::post('update/{id}','admin\CategoriesController@update');

			// Delete Category
			Route::get('delete/{id}','admin\CategoriesController@destroy');
		});

		// Sub Categories
		Route::prefix('sub-categories')->group(function () {
			//Show All
			Route::get('list','admin\SubCategoriesController@index');

			// Create Category
			Route::get('create','admin\SubCategoriesController@create');
			Route::post('store','admin\SubCategoriesController@store');

			// update Category
			Route::get('edit/{id}','admin\SubCategoriesController@edit');
			Route::post('update/{id}','admin\SubCategoriesController@update');

			// Delete Category
			Route::get('delete/{id}','admin\SubCategoriesController@destroy');
		});
		// brands
		Route::prefix('brands')->group(function () {
			//Show All
			Route::get('list','admin\BrandsController@index');

			// Create brands
			Route::get('create','admin\BrandsController@create');
			Route::post('store','admin\BrandsController@store');

			// update brands
			Route::get('edit/{id}','admin\BrandsController@edit');
			Route::post('update/{id}','admin\BrandsController@update');

			// Delete brands
			Route::get('delete/{id}','admin\BrandsController@destroy');
		});

		//Products Routes
		Route::prefix('products')->group(function () {
			//Show All
			Route::get('list','admin\ProductController@index');

			//new product design
			Route::get('new','admin\ProductController@show');

			// Create Category
			Route::get('create','admin\ProductController@create');
			Route::post('store','admin\ProductController@store');

			// update Category
			Route::get('edit/{id}','admin\ProductController@edit');
			Route::post('update/{id}','admin\ProductController@update');

			// Delete Category
			Route::get('delete/{id}','admin\ProductController@destroy');
		});

		//Customers Routes
		Route::prefix('customers')->group(function () {

			//Show All
			Route::get('list','admin\CustomerController@index');

			//Delete Customers
			Route::get('delete/{id}','admin\CustomerController@destroy');

		});

		//Orders Routes
		Route::prefix('orders')->group(function () {

			//Show All
			Route::get('list','admin\OrderController@index');

			//View Order
			Route::get('details/{id}','admin\OrderController@Show');
			//Action status
			Route::post('change/status','admin\OrderController@update');

			//Delete Customers
			Route::get('delete/{id}','admin\OrderController@destroy');

		});

	});
    Route::get('form','admin\AdminConroller@getform');
    Route::get('product','admin\AdminConroller@product');
    Route::get('order','admin\AdminConroller@order');
    Route::get('brand','admin\AdminConroller@brand');
    Route::get('brand_list','admin\AdminConroller@brand_list');
});
 //logout
 Route::get('logout','admin\AdminConroller@logout');


Route::get('/','frontend\HomeController@index');
Route::prefix('product')->group(function () {
	Route::get('{slug}','frontend\HomeController@single');
	Route::get('show-quick-view/{id}','frontend\HomeController@show');
});
Route::get('/','frontend\HomeController@index');


//Customer Login

Route::prefix('user')->group(function () {

	Route::group(['middleware' => ['redirect']], function () {
		// Register Customer
		Route::get('signup', 'frontend\UserController@create');
		
		// User Login
		Route::get('signin', 'frontend\UserController@index');
		Route::get('social/connecting/{social_login}', 'frontend\UserController@social');

		//lohin via Gmail
	Route::get('login/{social_login}', 'frontend\UserController@redirectToProvider');
	Route::get('login/{social_login}/callback', 'frontend\UserController@handleProviderCallback');
		
	});

	Route::post('register','frontend\UserController@store');
	Route::post('auth','frontend\UserController@show');


	//Logout
	Route::get('logout','frontend\UserController@logout');

	//profile
	Route::group(['middleware' => ['user']], function () {
		Route::get('{slug}', 'frontend\UserController@account');
	});
});

Route::get('mail/verify/{email}', 'frontend\EmailController@index');

//Search Routes
Route::get('search','frontend\HomeController@doSearch');
Route::get('main/search','frontend\HomeController@search');

// Cart Management
Route::get('cart', 'frontend\Cart@index');
Route::get('empty-cart', 'frontend\Cart@emptyCart');
Route::get('add-to-cart/{id}', 'frontend\Cart@create');
Route::delete('remove-from-cart', 'frontend\Cart@destroy');

//Checout

Route::prefix('checkout')->group(function () {
	Route::get('/', 'frontend\Checkout@index');
	Route::post('user/personal', 'frontend\Checkout@store');
	Route::post('user/delivery/{id}', 'frontend\Checkout@edit');
	Route::post('save/order', 'frontend\Checkout@save_order');
	Route::get('order/{id}', 'frontend\Checkout@show');
});	

Route::get('{category}','frontend\HomeController@list');
Route::get('{category}/{s_category}','frontend\HomeController@list');
Route::get('{category}/{s_category}/{brand}','frontend\HomeController@list');


