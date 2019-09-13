<?php

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
//Admin
Route::post('admin-login','AdminController@loginAdmin')->name('admin.login');
//Route::get('admin/login','AdminController@getLogin')->name('login.admin');
Route::view('admin/login','admin.pages.login')->name('login.admin');
Route::get('admin-logout','AdminController@logout')->name('admin.logout');
Route::get('getproducttype','AjaxController@getProductType');
Route::group(['prefix' => 'admin', 'middleware' => 'adminMiddleware'], function(){
	// localhost/admin/...
	Route::view('/dashboard','admin.pages.index')->name('admin.index');
	Route::resource('category','CategoryController');
	Route::resource('producttype','ProductTypeController');
	Route::resource('product','ProductController');
	Route::resource('order','OrderController');
	Route::resource('user','UserController');
});
//Client
Route::get('callback/{social}','UserController@handleProviderCallback');
Route::get('login/{social}','UserController@redirectProvider')->name('login.social');
Route::get('logout','UserController@logout')->name('logout');
Route::get('login/googl/{social}', 'GoogleController@redirectToProvider')->name('login.google.social');
Route::get('google/callback/{social}', 'GoogleController@handleProviderCallback');
Route::get('client-login','UserController@getClientLogin')->name('client-login');
Route::post('client-login', 'UserController@loginClient')->name('client-login');
Route::get('client-register','UserController@getRegister')->name('client-register');
Route::post('register','UserController@registerClient')->name('register');

Route::get('/', 'HomeController@index');

Route::resource('cart','CartController');

Route::get('addcart/{id}','CartController@addCart')->name('addCart');
Route::get('checkout','CartController@checkout')->name('checkout');
Route::get('product-detail/{id}/{slug}','ProductDetailController@show')->name('product-detail');
Route::get('subcate/{id}/{slug}', 'ProductDetailController@getProductsBySub')->name('subcate-products');
//edit user
Route::get('info/{id}','DetailUserController@show')->name('user-detail');
Route::post('info/{id}','DetailUserController@updateProfile')->name('update-profile');
Route::get('info/edit/{id}','DetailUserController@getEdit')->name('user-edit');
Route::get('edit-password','DetailUserController@getEditPassword')->name('edit-password');
Route::post('put-password/{id}','DetailUserController@putPassword')->name('put-password');
Route::get('product-add','ProductController@getConfiguration');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

