<?php

/*
================================
		Admin Routes
================================
*/

Route::prefix('admin')->group(function(){

	// Login Route
	Route::get('/login','Auth\Admin\LoginController@showLoginForm')->name('admin.login');
	Route::post('/login/submit','Auth\Admin\LoginController@login')->name('admin.login.submit');
	Route::post('/logout','Auth\Admin\LoginController@logout')->name('admin.logout');

	// Send email
	Route::get('/password/reset','Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('/password/email','Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

	// Reset password
	Route::get('/password/reset/{token}','Auth\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
	Route::post('/password/reset/update','Auth\Admin\ResetPasswordController@reset')->name('admin.password.update');

	// Dashboard Route
	Route::get('/','Admin\AdminController@index')->name('admin.dashboard');

	// Product Routes
	Route::get('/products','Admin\ProductController@index')->name('products');
	Route::post('/product/store','Admin\ProductController@store')->name('Product.store');
	Route::get('/delete/{id}','Admin\ProductController@delete');
	Route::get('/edit/{id}','Admin\ProductController@edit');
	Route::post('/update/{id}','Admin\ProductController@update');

	// Orders Routes
	Route::get('/orders','Admin\OrderController@index')->name('orders');
	Route::get('/order/view/{id}','Admin\OrderController@show')->name('admin.order.view');
	Route::get('/order/delete/{id}','Admin\OrderController@destroy')->name('admin.order.delete');
	Route::get('/order/pay/{id}','Admin\OrderController@paid')->name('admin.order.pay');
	Route::get('/order/complete/{id}','Admin\OrderController@complete')->name('admin.order.complete');
	Route::post('/order/update/{id}','Admin\OrderController@discountShippingCostUpdate')->name('admin.order.dis-ship-cost-update');
	Route::get('/order/invoice/{id}','Admin\OrderController@invoiceGenerate')->name('admin.order.invoice-generate');

// Category Routes
	Route::get('/categories','Admin\CategoryController@index')->name('categories');
	Route::post('/category/store','Admin\CategoryController@store')->name('category.store');
	Route::get('/category/edit/{id}','Admin\CategoryController@edit')->name('category.edit');
	Route::post('/category/update/{id}','Admin\CategoryController@update')->name('category.update');
	Route::get('/category/delete/{id}','Admin\CategoryController@delete')->name('category.delete');

// Brand Routes
	Route::get('/brands','Admin\BrandController@index')->name('brands');
	Route::post('/brand/store','Admin\BrandController@store')->name('brand.store');
	Route::get('/brand/edit/{id}','Admin\BrandController@edit')->name('brand.edit');
	Route::post('/brand/update/{id}','Admin\BrandController@update')->name('brand.update');
	Route::get('/brand/delete/{id}','Admin\BrandController@delete')->name('brand.delete');

	// Division Routes
	Route::get('/divisions','Admin\DivisionController@index')->name('divisions');
	Route::post('/division/store','Admin\DivisionController@store')->name('division.store');
	Route::get('/division/edit/{id}','Admin\DivisionController@edit')->name('division.edit');
	Route::post('/division/update/{id}','Admin\DivisionController@update')->name('division.update');
	Route::get('/division/delete/{id}','Admin\DivisionController@destroy')->name('division.delete');

	// District Routes
	Route::get('/districts','Admin\DistrictController@index')->name('districts');
	Route::post('/district/store','Admin\DistrictController@store')->name('district.store');
	Route::get('/district/edit/{id}','Admin\DistrictController@edit')->name('district.edit');
	Route::post('/district/update/{id}','Admin\DistrictController@update')->name('district.update');
	Route::get('/district/delete/{id}','Admin\DistrictController@destroy')->name('district.delete');

	// Slider Routes
	Route::get('/sliders','Admin\SliderController@index')->name('sliders');
	Route::post('/slider/store','Admin\SliderController@store')->name('slider.store');
	Route::get('/slider/edit/{id}','Admin\SliderController@edit')->name('slider.edit');
	Route::post('/slider/update/{id}','Admin\SliderController@update')->name('slider.update');
	Route::get('/slider/delete/{id}','Admin\SliderController@destroy')->name('slider.delete');
});


/*
================================
		Users Routes
================================
*/
// User Verification Route
Route::prefix('user')->group(function(){
	Route::get('/userVerify/{token}','Users\userVerifyController@verify')->name('user.verification');
	Route::get('/dashboard','Users\UserController@dashboard')->name('user.dashboard');
	Route::get('/profile','Users\UserController@profile')->name('user.profile');
	Route::post('/profile/update','Users\UserController@profileUpdate')->name('user.profile.update');
});


/*
================================
		Front-End Routes
================================
*/
// Frontend products show
Route::get('/','Frontend\ProductController@index');
Route::prefix('products')->group(function(){
	Route::get('/singleProduct/show/{slug}','Frontend\ProductController@singleProductShow')->name('singleProduct.show');
	Route::get('/search/product','Frontend\ProductController@productSearch')->name('search');
	Route::get('/allProduct','Frontend\ProductController@allProduct')->name('allProduct.show');
	//Category routes for sidebar
	Route::get('/category','Frontend\CategoryController@index')->name('category.index');
	Route::get('/category/{id}','Frontend\CategoryController@show')->name('category.show');
});

// Cart Routes
Route::prefix('cart')->group(function(){
	Route::get('/','Frontend\CartController@index')->name('carts');
	Route::post('/store','Frontend\CartController@store')->name('cart.store');
	Route::post('/update/{id}','Frontend\CartController@update')->name('cart.update');
	Route::post('/delete/{id}','Frontend\CartController@destroy')->name('cart.delete');
});

// Checkout Routes
Route::prefix('checkout')->group(function(){
	Route::get('/','Frontend\CheckoutController@index')->name('checkouts');
	Route::post('/store','Frontend\CheckoutController@store')->name('checkout.store');
	
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Api Route for get all district under a division

Route::get('/division/get/district/{id}',function($id){
	return json_encode(App\Model\District::where('division_id',$id)->get());
});
