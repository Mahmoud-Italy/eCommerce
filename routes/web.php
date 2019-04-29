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


use Illuminate\Support\Facades\Mail;

Route::get('testMail',function(){


    	$row = App\User::find(1);
	    Mail::send('emails.test',['row',$row],  function($message) {
	        $message->to('mahmoud.italy@outlook.com', 'MH')->subject('test mail from localhost');
	    });  



});






#Old School
//Route::resource('/','CategoryCtrl');
// Route::get('/','AppCtrl@index');
// Route::get('create','AppCtrl@create');
// Route::post('create','AppCtrl@doCreate');
// Route::get('category/edit/{categoryId}', 'AppCtrl@editCategory');
// Route::post('category/edit/{categoryId}', 'AppCtrl@updateCategory');
// Route::post('category/destroy/{categoryId}', 'AppCtrl@destroyCategory');




Route::get('addmoney/stripe', 'frontend\AppCtrl@payWithStripe')->name('payment');
Route::post('addmoney/stripe', 'frontend\AppCtrl@postPaymentWithStripe')->name('addmoney.stripe');

$lang = 'en';
$lang = \Request::segment(1);
if($lang == 'ar') { App::setlocale('ar'); } 
else { App::setlocale('en');}

function isAr($lang) {
	if($lang == 'ar') return true;
	else return false;
}

Route::group(['prefix'=>$lang], function() use ($lang){
#Home
Route::get('/','frontend\AppCtrl@index');
#Login
Route::get('login', 'frontend\AppCtrl@login');
Route::post('login', 'frontend\AppCtrl@doLogin');
#Register
Route::post('register', 'frontend\AppCtrl@doRegister');
#Forget Password
Route::get('forget-pwd', 'frontend\AppCtrl@forget');
Route::post('forget-pwd', 'frontend\AppCtrl@doForget');
#Reset Password
Route::get('reset-pwd/{key}', 'frontend\AppCtrl@reset');
Route::post('reset-pwd/{key}', 'frontend\AppCtrl@doReset');
Route::get('logout', 'frontend\AppCtrl@logout');

Route::get('contact', 'frontend\AppCtrl@contact');
Route::get('search', 'frontend\AppCtrl@search');

Route::get('cart', 'frontend\AppCtrl@cart');
Route::post('ajax/AddToCart', 'frontend\AppCtrl@addCart');
Route::get('wishlist', 'frontend\AppCtrl@wishlist');
Route::post('ajax/AddToWishlist', 'frontend\AppCtrl@addWishlist');
Route::post('remove/wishlist/{id}','frontend\AppCtrl@destroyWishlist');
Route::post('ajax/UpdateQty', 'frontend\AppCtrl@updateQty');

Route::get('checkout', 'frontend\AppCtrl@checkout');
Route::post('checkout', 'frontend\AppCtrl@doCheckout');

#Category
Route::get('subcat/{name}/{id}', 'frontend\AppCtrl@category');
});









#Admin
Route::group(['prefix'=>'dashboard'],function(){

#Dash
Route::get('/', 'backend\DashCtrl@index');

#Category
Route::get('categories', 'backend\CategoryCtrl@index');
Route::get('categories/create', 'backend\CategoryCtrl@create');
Route::post('categories/create', 'backend\CategoryCtrl@store');
Route::get('categories/edit/{catId}', 'backend\CategoryCtrl@edit');
Route::post('categories/edit/{catId}', 'backend\CategoryCtrl@update');
Route::post('categories/destroy/{catId}', 'backend\CategoryCtrl@destroy');

#Products
Route::get('products', 'backend\ProductCtrl@index');
Route::get('products/create', 'backend\ProductCtrl@create');
Route::post('products/create', 'backend\ProductCtrl@store');
Route::get('products/edit/{proId}', 'backend\ProductCtrl@edit');
Route::post('products/edit/{proId}', 'backend\ProductCtrl@update');
Route::post('products/destroy/{proId}', 'backend\ProductCtrl@destroy');

#Offers
Route::get('offers', 'backend\OfferCtrl@index');
Route::get('offers/create', 'backend\OfferCtrl@create');
Route::post('offers/create', 'backend\OfferCtrl@store');
Route::get('offers/edit/{proId}', 'backend\OfferCtrl@edit');
Route::post('offers/edit/{proId}', 'backend\OfferCtrl@update');
Route::post('offers/destroy/{proId}', 'backend\OfferCtrl@destroy');

#Orders
Route::get('orders', 'backend\OrderCtrl@index');
Route::get('orders/new', 'backend\OrderCtrl@new');
Route::get('orders/pending', 'backend\OrderCtrl@pending');
Route::get('orders/completed', 'backend\OrderCtrl@completed');

#SlideShow
Route::get('slides','backend\SlideCtrl@index');
Route::get('slides/create', 'backend\SlideCtrl@create');
Route::post('slides/create', 'backend\SlideCtrl@store');
Route::get('slides/edit/{id}','backend\SlideCtrl@edit');
Route::post('slides/edit/{id}','backend\SlideCtrl@update');
Route::post('slides/destroy/{id}','backend\SlideCtrl@destroy');


#Members
Route::get('members', 'backend/MemberCtrl@index');
Route::post('members/suspend/{id}', 'backend\MemberCtrl@suspend');
Route::post('members/restore/{id}', 'backend\MemberCtrl@restore');


#Settings
Route::get('settings', 'backend\SettingCtrl@index');
Route::post('settings/meta', 'backend\SettingCtrl@metaTags');
});






