<?php

/*
================================
		Admin Routes
================================
*/
// Dashboard Route
Route::prefix('admin')->group(function(){
	Route::get('/','Admin\AdminController@index');	
});
// Product Routes
Route::prefix('admin')->group(function(){
	Route::get('/products','Admin\ProductController@index')->name('products');
	Route::post('/product/store','Admin\ProductController@store')->name('Product.store');
	Route::get('/delete/{id}','Admin\ProductController@delete');
	Route::get('/edit/{id}','Admin\ProductController@edit');
	Route::post('/update/{id}','Admin\ProductController@update');

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
