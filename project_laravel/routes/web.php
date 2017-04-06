<?php



Route::get('/', 'HomeController@homePage');


Route::resource('/user', 'UsersController', ['only' => [
    'create', 'store'
]]);

Route::resource('/authentification', 'SessionsController', ['only' => [
    'create', 'store', 'destroy'
]]);

Route::group(['middleware' => ['CheckUserRole']], function () {

    Route::resource('/products', 'ProductsController', ['except' => [
        'index', 'show'
    ]]);

});

Route::get('/product/cart/add/{product_id}', 'CartProductsController@productAddToCart');

Route::get('/product/cart/remove/{product_id}', 'CartProductsController@productRemoveFromCart');

Route::get('/product/cart/reset', 'CartProductsController@productResetCart');


Route::get('/product/order', 'CartProductsController@getProductOrder');

Route::post('/product/order', 'CartProductsController@postProductOrder');

Route::get('/product/sendmail', 'CartProductsController@sendMail');

