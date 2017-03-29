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

Route::get('/', 'HomeController@homePage');

//Route::match(['get', 'post'], '/user/login' , 'UserController@userLogin');
Route::get('/user/login', 'UserController@getUserLogin');

Route::post('/user/login', 'UserController@postUserLogin');

Route::get('user/logout', 'UserController@userLogout');


Route::get('/product/add', 'ProductController@getProductAdd');

Route::post('/product/add', 'ProductController@postProductAdd');

Route::get('/product/{product_id}/edit', 'ProductController@getProductEdit');

Route::post('/product/{product_id}/edit', 'ProductController@postProductEdit');

Route::get('/product/{product_id}/delete', 'ProductController@productDelete');

Route::get('/product/{product_id}/addCart', 'ProductController@productAddToCart');

Route::get('/product/{product_id}/removeCart', 'ProductController@productRemoveFromCart');

Route::get('/product/resetCart', 'ProductController@productResetCart');


Route::get('/product/order', 'ProductController@getProductOrder');

Route::post('/product/order', 'ProductController@postProductOrder');


Route::get('/product/sendmail', 'ProductController@sendMail');
