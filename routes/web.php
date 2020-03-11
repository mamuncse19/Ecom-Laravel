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

Route::get('/', function () {
    return view('pages.index');
});

/*
================================
		Admin Routes
================================
*/
Route::prefix('admin')->group(function(){
	Route::get('/','Admin\AdminController@index');
	Route::get('/products','Admin\ProductController@index')->name('products');
	Route::post('/product/store','Admin\ProductController@store')->name('Product.store');
});
