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



#Old School
//Route::resource('/','CategoryCtrl');
// Route::get('/','AppCtrl@index');
// Route::get('create','AppCtrl@create');
// Route::post('create','AppCtrl@doCreate');
// Route::get('category/edit/{categoryId}', 'AppCtrl@editCategory');
// Route::post('category/edit/{categoryId}', 'AppCtrl@updateCategory');
// Route::post('category/destroy/{categoryId}', 'AppCtrl@destroyCategory');



Route::get('/','frontend\AppCtrl@index');

#Login
Route::get('login', 'frontend\AppCtrl@login');
Route::post('login', 'frontend\AppCtrl@doLogin');
Route::post('register', 'frontend\AppCtrl@doRegister');
Route::get('logout', 'frontend\AppCtrl@logout');


Route::get('category','frontend\AppCtrl@category');
Route::get('contact', 'frontend\AppCtrl@contact');
Route::get('search', 'frontend\AppCtrl@search');
Route::get('cart', 'frontend\AppCtrl@cart');








Route::get('dashboard', 'backend\DashCtrl@index');

#Category
Route::get('dashboard/categories', 'backend\CategoryCtrl@index');
Route::get('dashboard/categories/create', 'backend\CategoryCtrl@create');
Route::post('dashboard/categories/create', 'backend\CategoryCtrl@store');
Route::get('dashboard/categories/edit/{catId}', 'backend\CategoryCtrl@edit');
Route::post('dashboard/categories/edit/{catId}', 'backend\CategoryCtrl@update');
Route::post('dashboard/categories/destroy/{catId}', 'backend\CategoryCtrl@destroy');

#Products
Route::get('dashboard/products', 'backend\ProductCtrl@index');
Route::get('dashboard/products/create', 'backend\ProductCtrl@create');
Route::post('dashboard/products/create', 'backend\ProductCtrl@store');
Route::get('dashboard/products/edit/{proId}', 'backend\ProductCtrl@edit');
Route::post('dashboard/products/edit/{proId}', 'backend\ProductCtrl@update');
Route::post('dashboard/products/destroy/{proId}', 'backend\ProductCtrl@destroy');

#Orders
Route::get('dashboard/orders', 'backend\OrderCtrl@index');
Route::get('dashboard/orders/new', 'backend\OrderCtrl@new');
Route::get('dashboard/orders/pending', 'backend\OrderCtrl@pending');
Route::get('dashboard/orders/completed', 'backend\OrderCtrl@completed');


#Members
Route::get('dashboard/members', 'backend/MemberCtrl@index');
Route::post('dashboard/members/suspend/{id}', 'backend\MemberCtrl@suspend');
Route::post('dashboard/members/restore/{id}', 'backend\MemberCtrl@restore');


#Settings
Route::get('dashboard/settings', 'backend\SettingCtrl@index');
Route::post('dashboard/settings/meta', 'backend\SettingCtrl@metaTags');








