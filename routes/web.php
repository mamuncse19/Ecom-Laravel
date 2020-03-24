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
});
// Category Routes
Route::prefix('admin')->group(function(){
	Route::get('/categories','Admin\CategoryController@index')->name('categories');
	Route::post('/category/store','Admin\CategoryController@store')->name('category.store');
	Route::get('/category/edit/{id}','Admin\CategoryController@edit')->name('category.edit');
	Route::post('/category/update/{id}','Admin\CategoryController@update')->name('category.update');
	Route::get('/category/delete/{id}','Admin\CategoryController@delete')->name('category.delete');
});



/*
================================
		Front-End Routes
================================
*/
// Frontend products show
Route::get('/','Frontend\ProductController@index');
Route::prefix('frontend')->group(function(){
	Route::get('singleProduct/show/{slug}','Frontend\ProductController@singleProductShow')->name('singleProduct.show');
	Route::get('search/product/','Frontend\ProductController@productSearch')->name('search');
});
